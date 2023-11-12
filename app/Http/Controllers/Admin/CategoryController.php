<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
   public function categories(){
       Session::put('page','categories');
       $categories=Category::with(['section','parentcategory'])->get()->toArray();
       return view('admin.categories.categories')->with(compact('categories'));

   }
    public function updateCategoryStatus(Request $request){
        Session::put('page','categories');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Category::where('id',$data['category_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'category_id',$data['category_id']]);
    }
    public function addEditCategory( Request $request,$id=null){
        Session::put('page','categories');
       if ($id==""){
           //Add Category
           $title="Add Category";
           $category=new Category;
           $message="دسته بندی با موفقیت اضافه شد";
       }else{
           //Edit Category
           $title="Edit Category";
           $category=find($id);
           $message="دسته بندی با موفقیت بروزرسانی شد";
       }
       if ($request->isMethod('post')){
           $data=$request->all();
           //Upload Category Image
           if ($request->hasFile('category_image')){
               $image_temp=$request->file('category_image');
               if ($image_temp->isValid()){
                   //Get Image Extension
                   $extension=$image_temp->getClientOriginalExtension();
                   //Generate New Image Name
                   $imageName=rand(111,99999).'.'.$extension;
                   $imagePath='admin/images/photos/'.$imageName;
                   //Upload the Image
                   Image::make($image_temp)->save($imagePath);
                   $category->category_image=$imageName;
               }

           }
           else {
               $imageName='';
               $category->category_image=$imageName;
           }
           $category->section_id=$data['section_id'];
           $category->category_name=$data['category_name'];
           $category->parent_id=$data['parent_id'];
           $category->category_discount=$data['category_discount'];
           $category->description=$data['description'];
           $category->url=$data['url'];
           $category->meta_title=$data['meta_title'];
           $category->meta_description=$data['meta_description'];
           $category->meta_keywords=$data['meta_keywords'];
           $category->status=1;
           $category->save();
           return redirect('admin/categories')->with('success_message',$message);



       }
       //Get all sections
        $getSections=Section::get()->toArray();
       return view('admin.categories.add_edit_category')->with(compact('title','category','getSections'));

    }
}
