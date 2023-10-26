<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorsRecords=[
          ['id'=>1,'name'=>'نادر داورمنش', 'address'=>'CP-112' ,'city'=>'کرمانشاه','state'=>'kermanshah'
          ,'country'=>'iran','pincode'=>'110112','mobile'=>'09126612898','email'=>'naer2.davarmanesh62@gmial.com'
          ,'status'=>0]
        ];
        Vendor::insert($vendorsRecords);
    }
}
