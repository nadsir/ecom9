<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItemStatus;
use App\Models\OrdersLogs;
use App\Models\OrdersProduct;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        Session::put('page','orders');
        $adminType=Auth::guard('admin')->user()->type;
        $vendor_id=Auth::guard('admin')->user()->vendor_id;
        if ($adminType=='vendor'){
            $vendorStatus=Auth::guard('admin')->user()->status;
            if ($vendorStatus==0){
                return redirect('admin/update-vendor-details/personal')->with('error_message',' تاکنون حساب کاربری شما توسط ادمین تایید نشده . از صحت تکمیل اطلاعات شغلی و شخصی خود اطمینان حاصل فرمایید. ');
            }
        }
        if ($adminType=="vendor"){
            $orderDetails=Order::with(['orders_products'=>function($query)use($vendor_id){
                $query->where('vendor_id',$vendor_id);

            }])->where('id',$id)->first()->ToArray();

        }else{
            $orderDetails=Order::with('orders_products')->where('id',$id)->first()->ToArray();

        }

        $userDetails=User::Where('id',$orderDetails['user_id'])->first()->toArray();
        $orderStatuses=OrderStatus::where('status',1)->get()->toArray();
        $orderItemStatuses=OrderItemStatus::where('status',1)->get()->toArray();
        $orderLog=OrdersLogs::where('order_id',$id)->get()->toArray();

        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails','orderStatuses','orderItemStatuses','orderLog'));
    }
    public function updateOrderStatus(Request $request){
        Session::put('page','orders');
        if ($request->isMethod('post')){
            $data=$request->all();
            //Update Order Status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            //Update Order Log
            $log=New OrdersLogs;
            $log->order_id=$data['order_id'];
            $log->order_status=$data['order_status'];
            $log->save();
            //Get Delivery Details
            $deliveryDetails=Order::select('mobile','email','name')->where('id',$data['order_id'])->first()->toArray();
            $orderDetails=Order::with('orders_products')->where('id',$data['order_id'])->first()->toArray();
            //Send Order Status Update Email
            $email=$deliveryDetails['email'];
            $messageData=[
                'email'=>$email,
                'name'=>$deliveryDetails['name'],
                'order_id'=>$data['order_id'],
                'orderDetails'=>$orderDetails,
                'order_status'=>$data['order_status'],
            ];
            Mail::send('emails.order_status',$messageData,function($message)use ($email){
                $message->to($email)->subject('Order Status Update - StackDeveloper.in');
            });

            //Send Order Status Sms
            //Send Order SMS
            /*                //Send Register Sms
            $message="کاربر گرامی شما با موفقیت ثبت نام شدید";
            $mobile=$data['mobile'];
            Sms::sendSms($message,$mobile);*/

            $message='سفارش به صورت صحیح بروزرسانی شد.';
            return redirect()->back()->with('success_message',$message);
        }

    }
    public function updateOrderItemStatus(Request $request){
    Session::put('page','orders');
        if ($request->isMethod('post')){
            $data=$request->all();
            //Update Order Status
            OrdersProduct::where('id',$data['order_item_id'])->update(['item_status'=>$data['item_status']]);
            $getOrderId=OrdersProduct::select('order_id')->where('id',$data['order_item_id'])->first()->toArray();
            //Get Delivery Details
            $deliveryDetails=Order::select('mobile','email','name')->where('id',$getOrderId['order_id'])->first()->toArray();
            $orderDetails=Order::with('orders_products')->where('id',$getOrderId['order_id'])->first()->toArray();
            //Send Order Status Update Email
            $email=$deliveryDetails['email'];
            $messageData=[
                'email'=>$email,
                'name'=>$deliveryDetails['name'],
                'order_id'=>$getOrderId['order_id'],
                'orderDetails'=>$orderDetails,
                'order_status'=>$data['item_status'],
            ];
            Mail::send('emails.order_status',$messageData,function($message)use ($email){
                $message->to($email)->subject('Order Status Update - StackDeveloper.in');
            });

            //Send Order Status Sms
            //Send Order SMS
            /*                //Send Register Sms
            $message="کاربر گرامی شما با موفقیت ثبت نام شدید";
            $mobile=$data['mobile'];
            Sms::sendSms($message,$mobile);*/
            $message='سفارش به صورت صحیح بروزرسانی شد.';
            return redirect()->back()->with('success_message',$message);
        }

    }
}
