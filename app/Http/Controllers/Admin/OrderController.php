<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class OrderController extends Controller
{

    public function orders(){
        Session::put('page','orders');
        $adminType=Auth::guard('admin')->user()->type;
        $vendor_id=Auth::guard('admin')->user()->vendor_id;
        if ($adminType=='vendor'){
            $vendorStatus=Auth::guard('admin')->user()->status;
            if ($vendorStatus==0){
                return redirect('admin/update-vendor-details/personal')->with('error_message',' تاکنون حساب کاربری شما توسط ادمین تایید نشده . از صحت تکمیل اطلاعات شغلی و شخصی خود اطمینان حاصل فرمایید. ');
            }
        }
        if ($adminType=='vendor'){
            $orders=Order::with(['orders_products'=>function($query)use($vendor_id){
                $query->where('vendor_id',$vendor_id);

            }])->orderBy('id','Desc')->get()->ToArray();

        }else{
            $orders=Order::with('orders_products')->orderBy('id','Desc')->get()->ToArray();

        }
        return view('admin.orders.orders')->with(compact('orders'));

    }
}
