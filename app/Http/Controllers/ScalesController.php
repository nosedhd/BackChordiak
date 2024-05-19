<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Scale;

class ScalesController extends Controller
{
    function getScales(){
        $scales =  Scale::all();
        return $scales;
    }
}
