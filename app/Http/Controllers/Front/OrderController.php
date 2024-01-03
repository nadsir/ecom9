<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Auth;

class OrderController extends Controller
{
    public function oreders($id=null){
        if (empty($id)){
            $orders=Order::with('orders_products')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
            return view('front.orders.orders')->with(compact('orders'));
        }else{
          $orderDetails=Order::with('orders_products')->where('id',$id)->first()->toArray();

            return view('front.orders.orders_details')->with(compact('orderDetails'));
        }


    }
}
