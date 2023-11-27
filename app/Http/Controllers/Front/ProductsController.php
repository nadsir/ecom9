<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function listing(){
        $url=Route::getFacadeRoot()->current()->uri();
        $categoryCount=Category::where(['url'=>$url,'status'=>1])->count();
        if ($categoryCount>0){
            //Get Category Details
            $categoryDetails=Category::categoryDetails($url);
            $categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1)->get()->toArray();

            return view('front.products.listing')->with(compact('categoryDetails','categoryProducts'));


        }else{
            abort('404');
        }

    }
}
