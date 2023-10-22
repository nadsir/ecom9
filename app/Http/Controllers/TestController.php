<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\renderUsing;
use Illuminate\Support\Facades\App;
class TestController extends Controller
{

    public function index(){


        $value = config('app.name');
        return $value;
    }
}
