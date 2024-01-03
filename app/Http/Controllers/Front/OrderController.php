<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Auth;

class OrderController extends Controller
{
    public function oreders(){
        $orders=Order::with('orders_products')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();

        return view('front.orders.orders')->with(compact('orders'));

    }
}
