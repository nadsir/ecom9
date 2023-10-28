<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;
class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecord=[
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'Roya galley','shop_address'=>'123-SCF','shop_city'=>'کرمانشاه','shop_state'=>'کرمانشاه',
                'shop_country'=>'ایران','shop_pincode'=>'13621687','shop_mobile'=>'09126612898','shop_website'=>'roygallery@gmail.com',
                'shop_email'=>'nader2.davarmanesh62@gmail.com','address_proof'=>'passport','address_proof_image'=>'test.jpg','business_license_number'=>'1362',
                'gst_number'=>'123','pan_number'=>'1234',
            ]

        ];
        VendorsBusinessDetail::insert($vendorRecord);
    }
}
