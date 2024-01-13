<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Session;

class ShippingController extends Controller
{
    public function shippingCharges(){
        Session::put('page','shipping');
        $shippingCharges=ShippingCharge::get()->toArray();
        return view('admin.shipping.shipping_charges')->with(compact('shippingCharges'));
    }
    public function updateShippingStatus(Request $request){
        Session::put('page','shipping');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        ShippingCharge::where('id',$data['shipping_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'shipping_id'=>$data['shipping_id']]);
    }
    public function editShippingCharges(Request $request,$id){
        Session::put('page','shipping');
        if ($request->isMethod('post')){
            $data=$request->all();
            ShippingCharge::where('id',$id)->update(['rate'=>$data['rate']]);
            $message="بروز رسانی هزینه ارسال با موفقیت انجام شد.";
            return redirect()->back()->with('success_message',$message);

        }
        $shippingDetails=ShippingCharge::where('id',$id)->first();
        $title="هزینه ارسال";
        return view('admin.shipping.edit_shipping_charges')->with(compact('shippingDetails','title'));

    }
}
