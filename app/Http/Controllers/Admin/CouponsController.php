<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class CouponsController extends Controller
{
    public function coupons(){
        Session::put('page','coupon');
        $coupons=Coupon::get()->toArray();
       return view('admin.coupons.coupons')->with(compact('coupons'));
    }
    public function updateCouponStatus(Request $request){
        Session::put('page','coupon');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'coupon_id',$data['coupon_id']]);
    }
    public function deleteCoupon($id){
        //Delete Section
        Coupon::where('id',$id)->delete();
        $message="بخش مورد نظر با موفقیت حذف شد !";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditCoupon(Request $request,$id=null){
        if ($id=""){
            //Add Coupon
            $title="اضافه کردن کوپن";
            $coupon=new Coupon;
            $message="کوپن با موفقیت اضافه شد";
        }else{
            //Update Coupon
            $title="بروزرسانی کوپن";
            $coupon=Coupon::find($id);
            $message="کوپن با موفقیت بروزرسانی شد";

        }
        if ($request->isMethod('post')){
            $data=$request->all();
            echo "<pre>";print_r($data);die;
        }
        //Get Sections with Categories and sub categories
        $categories=Section::with('categories')->get()->toArray();
        //Get All Brands
        $brandss=Brand::where('status',1)->get()->toArray();
        //Get All Users
        $users=User::select('email')->where('status',1)->get();

        return view('admin.coupons.add_edit_coupon')->with(compact('title','message','categories','brandss','users'));
    }
}
