<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;
    public static function getShippingCharges($country){
        $getShippingDetails=ShippingCharge::select('rate')->where('country',$country)->first();
        return $getShippingDetails->rate;
    }
}
