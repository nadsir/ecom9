<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;


class ProductsController extends Controller
{
    public function products(){
        Session::put('page','product_images');
        $products=Product::with(['section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        }])->get()->toArray();

        return view('admin.product_images.product_images')->with(compact('products'));

    }
    public function updateProductStatus(Request $request){
        Session::put('page','product_images');
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
        Session::put('page','product_images');
        if ($id==""){
            $title="اضافه کردن محصول";
        }else{
            $title="اصلاح محصول";

        }
        //Get Sections with Categories and sub categories
        $categories=Section::with('categories')->get()->toArray();
        //Get All Brands
        $brands=Brand::where('status',1)->get()->toArray();




        return view('admin.products.add_edit_product')->with(compact('title','categories','brands'));


    }
}
