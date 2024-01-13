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
        Session::put('page','brands');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        ShippingCharge::where('id',$data['shipping_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'shipping_id'=>$data['shipping_id']]);
    }
}
