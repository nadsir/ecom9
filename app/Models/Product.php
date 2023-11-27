<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo('App\Models\Section','section_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function attributes(){
        return $this->hasMany('App\Models\ProductAttribute','product_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
    public function images(){
        return $this->hasMany('App\Models\ProductsImage');
    }
    public static function getDiscountPrice($product_id){
        $proDetails=Product::select('product_price','product_discount','category_id')->where('id',$product_id)->first();
        $proDetails=json_decode(json_encode($proDetails),true);
        $catDetails=Category::select('category_discount')->where('id',$proDetails['category_id'])->first();
        $catDetails=json_decode(json_encode($catDetails),true);
        if ($proDetails['product_discount']>0){
            //if product discount is added from the admin panel
            $discounted_price=$proDetails['product_price']-($proDetails['product_price']*$proDetails['product_discount']/100);
        }else if($catDetails['category_discount']>0){
            // If product discount is not added but category discount added from admin panel
            $discounted_price=$proDetails['product_price']-($proDetails['product_price']*$catDetails['category_discount']/100);
        }else{
            $discounted_price=0;
        }
        return $discounted_price;

    }
    public static function isProductNew($product_id){
        //Get Last 3 Products
        $productIds=Product::select('id')->where('status',1)->orderBy('id','Desc')->limit(3)->pluck('id');
        $productIds=json_decode(json_encode($productIds),true);
        if (in_array($product_id,$productIds)){
            $isProductNew="Yes";
        }else{
            $isProductNew="No";
        }
        return $isProductNew;

    }

}
