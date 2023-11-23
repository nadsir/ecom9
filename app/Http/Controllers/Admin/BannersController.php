<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Session;
use Image;

class BannersController extends Controller
{
    public function banners(){
        Session::put('page','banner');
        $banners=Banner::get()->toArray();
        return view('admin.banners.banners')->with(compact('banners'));
    }
    public function updateBannerStatus(Request $request){

        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'banner_id',$data['banner_id']]);
    }
    public function deleteBanner($id){
        Session::put('page','banner');
        //Get Category Image
        $bannerImage=Banner::where('id',$id)->first();
        //Get Banner Image Path
        $banner_image_pat='front/images/banner_images/';
        //Delete Banner Image from banner_images folder if exist
        if (file_exists($banner_image_pat.$bannerImage->image)){
            unlink($banner_image_pat.$bannerImage->image);
        }
        //Delete Banner image form banner table
        Banner::where('id',$id)->delete();
        $message="بروزرسانی  عکس اسلایدر با موفقیت انجام شد";
        return redirect('admin/banners')->with('success_message',$message);
    }
    public function addEditBanner(Request $request,$id=null){
        Session::put('page','banner');
        if ($id==""){
            //Add Banner
            $banner=new Banner;
            $title="اضافه کدن اسلاید";
            $message="درج اسلایدر با موفقیت انجام شد";
        }else{
            //Update Banner
            $banner=Banner::find($id);
            $title="بروزرسانی اسلاید";
            $message="بروزرسانی اسلایدر با موفقیت انجام شد";
        }
        if ($request->isMethod('post')){
            $data=$request->all();
            $banner->link=$data['link'];
            $banner->title=$data['title'];
            $banner->type=$data['type'];
            $banner->alt=$data['alt'];
            $banner->status=1;
            if ($data['type']=="Slider"){
                $with="1920";
                $height="720";

            }else if ($data['type']=="Fix"){
                $with="1920";
                $height="450";
            }
            //upload banner image
            if ($request->hasFile('image')){
                $image_temp=$request->file('image');
                if ($image_temp->isValid()){
                    //Get Image Extension
                    $extension=$image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName=rand(111,99999).'.'.$extension;
                    $imagePath='front/images/banner_images/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->resize($with,$height)->save($imagePath);
                    $banner->image=$imageName;
                }

            }

            $banner->save();
            return redirect('admin/banners')->with('success_message',$message);
        }
        return view('admin.banners.add_edit_banner')->with(compact('title','banner'));



    }
}
