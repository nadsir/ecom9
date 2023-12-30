<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords=[
          ['id'=>1,'user_id'=>1,'name'=>'nader davar','address'=>'adfasd','city'=>'karaj','state'=>'alborz','country'=>'iran','pincode'=>'1234567890','mobile'=>'09126612898','status'=>1],
          ['id'=>2,'user_id'=>1,'name'=>'nader davar','address'=>'adfasd','city'=>'karaj','state'=>'alborz','country'=>'idran','pincode'=>'1234567890','mobile'=>'09126612898','status'=>1],
        ];
        DeliveryAddress::insert($deliveryRecords);

    }
}
