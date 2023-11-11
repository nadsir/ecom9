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
}
