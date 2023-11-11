<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;

class SectionController extends Controller
{
    public function sections(){
        $sections=Section::get()->toArray();
        return view('admin.sections.sections')->with(compact('sections'));


    }
    public function updateSectionStatus(Request $request){
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Section::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id',$data['section_id']]);
    }
    public function deleteSection($id){
        //Delete Section
        Section::where('id',$id)->delete();
        $message="بخش مورد نظر با موفقیت حذف شد !";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditSection(Request $request,$id=null){
        Session::put('page','sections');
        if ($id==""){
            $title="اضافه کردن بخش";
            $section=new Section;
            $message="بخش مورد نظر با موفقیت اضافه شد";
        }else{
            $title="تصحیح بخش";
            $section=Section::find($id);
            $message="بخش مورد نظر با موفقیت بروز رسانی شد";
        }
        if ($request->isMethod('post')){
            $data=$request->all();
            $rules=[
                'section_name'=>'required|regex:/^[\pL\s\-]+$/u',

            ];
            $customMessages = [
                'section_name.required' => 'فیلد بخش اجباری می باشد',
                'section_name.regex' => 'فیلد بخش باید مجاز باشد',

            ];
            $this->validate($request,$rules,$customMessages);
            $section->name=$data['section_name'];
            $section->status=1;
            $section->save();
            return redirect('admin/sections')->with('success_message',$message);
        }
        return view('admin.sections.add_edit_section')->with(compact('title','section'));

    }
}
