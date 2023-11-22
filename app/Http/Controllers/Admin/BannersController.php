<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Session;

class BannersController extends Controller
{
    public function banners(){
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
        Session::put('page','categories');
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

}
