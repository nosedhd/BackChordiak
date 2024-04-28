<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Nota;

class NotasController extends Controller
{
    function getNotas (){
        $notas = Nota::all();
        return $notas;
    }
}
