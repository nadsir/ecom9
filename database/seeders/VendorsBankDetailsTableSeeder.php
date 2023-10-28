<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecord=[
            ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'نادر داورمنش',
                'bank_name'=>'پارسیان','account_number'=>'3255445418',
                'bank_ifcs_code'=>'123456789',

            ]

        ];
        VendorsBankDetail::insert($vendorRecord);
    }
}
