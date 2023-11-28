<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

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
}
