<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;


class ProductsController extends Controller
{
    public function products(){
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
}
