<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productAttributesRecords=[
          ['id'=>1,'product_id'=>2,'size'=>'small','price'=>'1000','stock'=>'10','sku'=>'RC001-S','status'=>1],
            ['id'=>2,'product_id'=>2,'size'=>'medium','price'=>'1100','stock'=>'15','sku'=>'RC001-M','status'=>1],
            ['id'=>3,'product_id'=>2,'size'=>'large','price'=>'1200','stock'=>'20','sku'=>'RC001-L','status'=>1],
        ];
        ProductAttribute::insert($productAttributesRecords);
    }
}
