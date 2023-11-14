<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Session;
class BrandController extends Controller
{
    public function brands(){
        Session::put('page','brands');
        $brands=Brand::get()->toArray();
        return view('admin.brands.brands')->with(compact('brands'));


    }
    public function updateBrandStatus(Request $request){
        Session::put('page','brands');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'brand_id',$data['brand_id']]);
    }
    public function deleteBrand($id){
        //Delete Section
        Brand::where('id',$id)->delete();
        $message="بخش مورد نظر با موفقیت حذف شد !";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditBrand(Request $request,$id=null){
        Session::put('page','brands');
        if ($id==""){
            $title="اضافه کردن برند";
            $brand=new Brand();
            $message="بخش مورد نظر با موفقیت اضافه شد";
        }else{
            $title="تصحیح برند";
            $brand=Brand::find($id);
            $message="بخش مورد نظر با موفقیت بروز رسانی شد";
        }
        if ($request->isMethod('post')){
            $data=$request->all();
            $rules=[
                'brand_name'=>'required|regex:/^[\pL\s\-]+$/u',

            ];
            $customMessages = [
                'brand_name.required' => 'فیلد بخش اجباری می باشد',
                'brand_name.regex' => 'فیلد بخش باید مجاز باشد',

            ];
            $this->validate($request,$rules,$customMessages);
            $brand->name=$data['brand_name'];
            $brand->status=1;
            $brand->save();
            return redirect('admin/brands')->with('success_message',$message);
        }
        return view('admin.brands.add_edit_brand')->with(compact('title','brand'));

    }
}
