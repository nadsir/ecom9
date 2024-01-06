<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
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
    public function orderDetails($id){
        $orderDetails=Order::with('orders_products')->where('id',$id)->first()->ToArray();
        $userDetails=User::Where('id',$orderDetails['user_id'])->first()->toArray();
        $orderStatuses=OrderStatus::where('status',1)->get()->toArray();
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails','orderStatuses'));
    }
    public function updateOrderStatus(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();
            //Update Order Status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            $message='سفارش به صورت صحیح بروزرسانی شد.';
            return redirect()->back()->with('success_message',$message);

        }

    }
}
