<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;



class ProductsController extends Controller
{
    public function products(){
        Session::put('page','products');
        $products=Product::with(['section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        }])->get()->toArray();

        return view('admin.products.products')->with(compact('products'));

    }
    public function updateProductStatus(Request $request){
        Session::put('page','products');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Product::where('id',$data['product_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'product_id',$data['product_id']]);
    }
    public function deleteProduct($id){

        //Delete Category
        Product::where('id',$id)->delete();
        $message="محصول با موفقیت حذف شد";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditProduct(Request $request,$id=null){
        Session::put('page','products');
        if ($id==""){
            $title="اضافه کردن محصول";
            $product=new Product;
            $message='محصول مورد نظر با موفقیت درج شد';


        }else{
            $title="اصلاح محصول";


        }
        if ($request->isMethod('post')){
            $data=$request->all();
           /* echo "<pre>";print_r(Auth::guard('admin')->user()); die;*/
            $rules=[
                'category_id'=>'required',
                'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=>'required',
                'product_price'=>'required|numeric',
                'product_color'=>'required|regex:/^[\pL\s\-]+$/u',

            ];
            $customMessages = [
                'category_id.required' => 'فیلد  دسته بندی اجباری می باشد',
                'product_name.required' => 'فیلد نام محصول اجباری باشد',
                'product_name.regex' => 'فیلد نام محصول باید مجاز باشد',
                'product_code.required' => 'فیلد کد محصول اجباری باشد',
                'product_code.regex' => 'فیلد کد محصول باید مجاز باشد',
                'product_price.required' => 'فیلد قیمت محصول اجباری باشد',
                'product_price.regex' => 'فیلد قیمت محصول باید مجاز باشد',
                'product_color.required' => 'فیلد رنگ محصول اجباری باشد',
                'product_color.regex' => 'فیلد رنگ محصول باید مجاز باشد',

            ];
            $this->validate($request,$rules,$customMessages);

            //Save Product details in product  table
            $categoryDetails=Category::find($data['category_id']);
            $product->section_id=$categoryDetails['section_id'];
            $product->category_id=$data['category_id'];
            $product->brand_id=$data['brand_id'];

            $adminType=Auth::guard('admin')->user()->type;
            $vendor_id=Auth::guard('admin')->user()->vendor_id;
            $admin_id=Auth::guard('admin')->user()->id;
            $product->admin_type=$adminType;
            $product->admin_id=$admin_id;
            if ($adminType=='vendor'){
                $product->vendor_id=$vendor_id;
            }else{
                $product->vendor_id=0;
            }
            $product->product_name=$data['product_name'];
            $product->product_code=$data['product_code'];
            $product->product_color=$data['product_color'];
            $product->product_price=$data['product_price'];
            $product->product_discount=$data['product_discount'];
            $product->product_weight=$data['product_weight'];
            $product->description=$data['description'];
            $product->meta_title=$data['meta_title'];
            $product->meta_description=$data['meta_description'];
            $product->meta_keywords=$data['meta_keywords'];
            if (!empty($data['is_featured'])){
                $product->is_featured=$data['is_featured'];
            }else{
                $product->is_featured="No";
            }
            $product->status=1;
            $product->save();
            return redirect('admin/products')->with('success_message',$message);




        }




        //Get Sections with Categories and sub categories
        $categories=Section::with('categories')->get()->toArray();
        //Get All Brands
        $brandss=Brand::where('status',1)->get()->toArray();



        return view('admin.products.add_edit_product')->with(compact('title','categories','brandss'));


    }
}
