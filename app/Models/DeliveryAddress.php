<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DeliveryAddress extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','name','mobile','address','city','state','country','pincode','status'
    ];
    public static function deliveryAddresses(){
        $deliveryAddresses=DeliveryAddress::where('user_id',Auth::user()->id)->get()->toArray();
        return $deliveryAddresses;

    }
}
