<?php

namespace App\Models;

use Cryptommer\Smsir\Objects\Parameters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cryptommer\Smsir\Smsir;
class Sms extends Model
{
    use HasFactory;

    public static function sendSms($message,$mobile){

        $line_number="30007732907181";
        $messages=$message;
        $mobiles=array($mobile);
        $send_at=null;
        $send = smsir::Send();
        $send->bulk($messages, $mobiles,$send_at, $line_number);
    }
}
