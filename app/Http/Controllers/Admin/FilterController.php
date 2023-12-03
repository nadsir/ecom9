<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsFilter;

use App\Models\ProductsFiltersValue;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;
use DB;

class FilterController extends Controller
{
    public function filters(){
        Session::put('page','filters');
        $filters=ProductsFilter::get()->toArray();

        return view('admin.filters.filters')->with(compact('filters'));
    }
    public function updateFilterStatus(Request $request){
        Session::put('page','filters');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        ProductsFilter::where('id',$data['filter_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'filter_id',$data['filter_id']]);
    }
    public function filtersValues(){
        Session::put('page','filters');
        $filters_values=ProductsFiltersValue::get()->toArray();
        return view('admin.filters.filters_values')->with(compact('filters_values'));
    }
    public function updateFilterValueStatus(Request $request){
        Session::put('page','filters');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        ProductsFiltersValue::where('id',$data['filter_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'filter_id',$data['filter_id']]);
    }
    public function addEditFilter(Request $request,$id=null){
        Session::put('page','filters');
        if ($id==""){
            $title="اضافه کردن ستون فیلتر";
            $filter=new ProductsFilter;
            $message="فیلتر با موققیت اضافه شد";
        }else{
            $title="ویرایش  فیلتر";
            $filter=ProductsFilter::find($id);
            $message="ستون فیلتر با موققیت ویرایش شد";
        }
        if($request->isMethod('post')){
            $data=$request->all();
            $cat_ids=implode(',',$data['cat_ids']);
            //save filter details in products_filters table
            $filter->cat_ids=$cat_ids;
            $filter->filter_name=$data['filter_name'];
            $filter->filter_column=$data['filter_column'];
            $filter->status=1;
            $filter->save();
            //Add filter column in products table
            DB::statement('Alter table products add '.$data['filter_column'].' varchar(255) after description');
            return  redirect('admin/filters')->with('success_message',$message);
        }

        //Get Sections with Categories and sub categories
        $categories=Section::with('categories')->get()->toArray();
        return view('admin.filters.add_edit_filter')->with(compact('title','categories','filter'));

    }
    public function addEditFilterValue(Request $request,$id=null){
        Session::put('page','filters');
        if ($id==""){
            $title="اضافه کردن مقادیر فیلتر";
            $filter=new ProductsFiltersValue;
            $message="مقادیر فیلتر با موققیت اضافه شد";
        }else{
            $title="ویرایش مقادیر فیلتر";
            $filter=ProductsFiltersValue::find($id);
            $message="مقادیر فیلتر با موققیت ویرایش شد";
        }
        if($request->isMethod('post')){
            $data=$request->all();
            //save filter values details in products_filters_values table
            $filter->filter_id=$data['filter_id'];
            $filter->filter_value=$data['filter_value'];
            $filter->status=1;
            $filter->save();
            //Add filter column in products table
            return  redirect('admin/filters-values')->with('success_message',$message);
        }
        //Get Filters
        $filters=ProductsFilter::where('status',1)->get()->toArray();

        return view('admin.filters.add_edit_filter_values')->with(compact('title','filter','filters'));
    }
    public function categoryFilters(Request $request){
        if ($request->ajax()){
            $data=$request->all();
           /* echo "<pre>";print_r($data);die;*/
            $category_id=$data['category_id'];

            return response()->json([
                'view'=>(String)View::make('admin.filters.category_filters')->with(compact('category_id'))
            ]);
        }

    }
}
