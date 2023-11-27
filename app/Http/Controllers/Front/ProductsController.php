<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
            dd($categoryDetails);
            echo "category exists";die;

        }else{
            abort('404');
        }

    }
}
