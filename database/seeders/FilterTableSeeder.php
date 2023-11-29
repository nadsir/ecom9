<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsFilter;

class FilterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filterRecords=[
          ['id'=>1,'cat_ids'=>'1,10,4','filter_name'=>'Fabric','filter_column'=>'fabric','status'=>1],
            ['id'=>2,'cat_ids'=>'3,8','filter_name'=>'RAM','filter_column'=>'ram','status'=>1],
        ];
        ProductsFilter::insert($filterRecords);
    }
}
