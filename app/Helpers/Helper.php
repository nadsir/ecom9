<?php


use App\Models\Cart;


function totalCartItems(){
    if (Auth::check()){
        $user_id=Auth::user()->id;
        $totalCartItems=Cart::where('user_id',$user_id)->sum('Quantity');
    }else{
        $session_id=Session::get('session_id');
        $totalCartItems=Cart::where('session_id',$session_id)->sum('Quantity');
    }
    return $totalCartItems;
}
  function getCartItems(){
    if (Auth::check()){
        //If user logged in / pick auth id of the user
        $getCartItems=Cart::with(['product'=>function($query){
            $query->select('id','category_id','product_name','product_code','product_color','product_price','product_image');
        }])->orderBy('id','Desc')->where('user_id',Auth::user()->id)->get()->toArray();
    }else{
        //If user not logged in / pick session id of the user
        $getCartItems=Cart::with(['product'=>function($query){
            $query->select('id','category_id','product_name','product_code','product_color','product_price','product_image');
        }])->orderBy('id','Desc')->where('session_id',Session::get('session_id'))->get()->toArray();
    }
    return $getCartItems;
}
