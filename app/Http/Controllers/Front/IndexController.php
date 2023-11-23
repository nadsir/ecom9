<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(){
        $sliderBanner=Banner::where('type','Slider')->where('status',1)->get()->toArray();
        $fixBanner=Banner::where('type','Fix')->where('status',1)->get()->toArray();
        $newProducts=Product::orderBY('id','Desc')->where('status',1)->limit(4)->get()->toArray();
        return view('front.index')->with(compact('sliderBanner','fixBanner','newProducts'));
    }
}
