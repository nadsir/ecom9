<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public function vendorbussinesdetails(){
        return $this->belongsTo('App\Models\VendorsBusinessDetail','id','vendor_id');
    }
    public static function getVendorShop($vendorid){
        $getVendorShop=VendorsBusinessDetail::select('shop_name')->where('vendor_id',$vendorid)->first()->toArray();
        return $getVendorShop['shop_name'];
    }
    public static  function getVendorCommission($vendorid){
        $getVendorCommission=Vendor::select('commission')->where('id',$vendorid)->first();
        if ($getVendorCommission==null){
            $getVendorCommission=0;
            return $getVendorCommission;
        }else{
            return $getVendorCommission->commission;
        }



    }

}
