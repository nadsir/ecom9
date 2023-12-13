<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\Route;
use DB;

class ProductsController extends Controller
{
    public function listing(Request $request){
        if ($request->ajax()){
            $data=$request->all();
            $url=$data['url'];
            $_GET['sort']=$data['sort'];
            $categoryCount=Category::where(['url'=>$url,'status'=>1])->count();
            if ($categoryCount>0){
                //Get Category Details
                $categoryDetails=Category::categoryDetails($url);
                $categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
                //checking for Dynamic Filters
                $productFilters=ProductsFilter::productFilters();
                foreach ($productFilters as $key => $filter){
                    //If filter is selected
                    if (isset($filter['filter_column']) && isset($data[$filter['filter_column']])
                    && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])){
                        $categoryProducts->whereIn($filter['filter_column'],$data[$filter['filter_column']]);
                    }
                }

                if (isset($_GET['sort']) && !empty($_GET['sort'])){
                    //checking for sort
                    if ($_GET['sort'] == "product_latest"){
                        $categoryProducts->orderBy('products.id','Desc');
                    }else if ($_GET['sort']=="price_lowest"){
                        $categoryProducts->orderBy('products.product_price','Asc');
                    }else if ($_GET['sort']=="price_highest"){
                        $categoryProducts->orderBy('products.product_price','Desc');
                    }else if ($_GET['sort']=="name_z_a"){
                        $categoryProducts->orderBy('products.product_name','Desc');
                    }else if ($_GET['sort']=="name_a_z"){
                        $categoryProducts->orderBy('products.product_name','Asc');
                    }

                }
                //checking for size
                if (isset($data['size']) && !empty($data['size'])) {
                    $productIds=ProductAttribute::select('product_id')->whereIn('size',$data['size'])->pluck('product_id')->toArray();
                    $categoryProducts->whereIn('products.id',$productIds);
                }
                //checking for color
                if (isset($data['color']) && !empty($data['color'])) {
                    $productIds=Product::select('id')->whereIn('product_color',$data['color'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('products.id',$productIds);
                }
                //checking for price

                if (isset($data['price']) && !empty($data['price'])) {
                    foreach ($data['price'] as $key=>$price){
                        $priceArr=explode("-",$price);
                        $productIds[]=Product::select('id')->whereBetween('product_price',[$priceArr[0],$priceArr[1]])->pluck('id')->toArray();

                    }
                    $productIds=call_user_func_array('array_merge',$productIds);
                    $categoryProducts->whereIn('products.id',$productIds);

                }
                //checking for brand
                if (isset($data['brand']) && !empty($data['brand'])) {
                    $productIds=Product::select('id')->whereIn('brand_id',$data['brand'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('products.id',$productIds);
                }



                $categoryProducts=$categoryProducts->paginate(30);

                return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url'));


            }else{
                abort('404');
            }

        }else{
            $url=Route::getFacadeRoot()->current()->uri();
            $categoryCount=Category::where(['url'=>$url,'status'=>1])->count();
            if ($categoryCount>0){
                //Get Category Details
                $categoryDetails=Category::categoryDetails($url);
                $categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
                if (isset($_GET['sort']) && !empty($_GET['sort'])){
                    //checking for sort
                    if ($_GET['sort'] == "product_latest"){
                        $categoryProducts->orderBy('products.id','Desc');
                    }else if ($_GET['sort']=="price_lowest"){
                        $categoryProducts->orderBy('products.product_price','Asc');
                    }else if ($_GET['sort']=="price_highest"){
                        $categoryProducts->orderBy('products.product_price','Desc');
                    }else if ($_GET['sort']=="name_z_a"){
                        $categoryProducts->orderBy('products.product_name','Desc');
                    }else if ($_GET['sort']=="name_a_z"){
                        $categoryProducts->orderBy('products.product_name','Asc');
                    }

                }

                $categoryProducts=$categoryProducts->paginate(30);

                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url'));


            }else{
                abort('404');
            }
        }


    }
    public function vendorListing($vendorid){
        //Get Vendor Shop name
        $getVendorShop=Vendor::getVendorShop($vendorid);
        //Get Vendor Products
        $vendorProducts=Product::with('brand')->where('vendor_id',$vendorid)->where('status',1);
        $vendorProducts=$vendorProducts->paginate(30);
       return view('front.products.vendor_listing')->with(compact('getVendorShop','vendorProducts'));

    }
    public function details($id){
        $productDetails=Product::with( ['section','category','brand','attributes'=>function($query){
            $query->where('stock','>',0)->where('status',1);

        },'images','vendor'])->find($id)->toArray();

        $categoryDetails=Category::categoryDetails($productDetails['category']['url']);

        //Get Similar Products
        $similarProducts=Product::with('brand')->where('category_id',$productDetails['category']['id'])->where('id','!=',$id)->limit(6)->inRandomOrder()->get()->toArray();
        //Set Session for recently viewed products
        if (empty(Session::get('session_id'))){
            $session_id=md5(uniqid(rand(),true));


        }else{
            $session_id=Session::get('session_id');
        }
        Session::put('session_id',$session_id);

        //insert product in table if not already exists
        $countRecentlyViewedProducts=DB::table('recently_viewed_products')->where(['product_id'=>$id,'session_id'=>$session_id])->count();
        if ($countRecentlyViewedProducts==0){
            DB::table('recently_viewed_products')->insert(['product_id'=>$id,'session_id'=>$session_id]);
        }
        //Get Recently Viewed Products Ids
        $recentProductsId=DB::table('recently_viewed_products')->select('product_id')->where('product_id','!=',$id)
            ->where('session_id',$session_id)->inRandomOrder()->get()->take(4)->pluck('product_id');

        //Get Recently Viewed Products
        $recentlyViewedProducts=Product::with('brand')->whereIn('id',$recentProductsId)->where('id','!=',$id)->limit(6)->inRandomOrder()->get()->toArray();

        //Get Group Products (products color)
        $groupProducts=array();
        if (!empty($productDetails['group_code'])){
            $groupProducts=Product::select('id','product_image')->where('id','!=',$id)->where(['group_code'=>$productDetails['group_code'],'status'=>1])->get()->toArray();
        }


        $totalStock=ProductAttribute::where('product_id',$id)->sum('stock');
        return view('front.products.details')->with(compact('productDetails','categoryDetails','totalStock','similarProducts','recentlyViewedProducts','groupProducts'));

    }
    public function getProductPrice(Request $request){
        if ($request->ajax()){
            $data=$request->all();
           /* echo "<pre>";print_r($data); die;*/
            $getDiscountAttributePrice=Product::getDiscountAttributePrice($data['product_id'],$data['size']);
            return $getDiscountAttributePrice;
        }

    }
    public function cartAdd(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();
           /* echo "<pre>";print_r($data);die;*/
            //Check Products Stock is available or not
            $getProductStock=ProductAttribute::getProductStock($data['product_id'],$data['size']);
            if ($getProductStock<$data['quantity']){
                return redirect()->back()->with('error_message','تعداد مورد نظر موجود نمی باشد');
            }
            //Generate Session Id if not exists
            $session_id=Session::get('session_id');
            if (empty($session_id)){
                $session_id=Session::getId();
                Session::put('session_id',$session_id);
            }
            //Save Product in carts table
            $item=new Cart;
            $item->session_id=$session_id;
            $item->product_id=$data['product_id'];
            $item->size=$data['size'];
            $item->quantity=$data['quantity'];
            $item->save();
            return redirect()->back()->with('success_message','محصول با موفقیت به کارت اضافه شد.');

        }

    }
}
