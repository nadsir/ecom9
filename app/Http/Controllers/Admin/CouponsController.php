<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Session;

class CouponsController extends Controller
{
    public function coupons(){
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
}
