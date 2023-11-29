<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsFilter extends Model
{
    use HasFactory;

    public static function geFilterName($filter_id)
    {

        $geFilterName = ProductsFilter::select('filter_name')->where('id', $filter_id)->first();
        return $geFilterName->filter_name;


    }
}
