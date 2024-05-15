<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Nota;

class NotasController extends Controller
{
    function getNotes (){
        $notas = Nota::all();

        // foreach($notas as $nota){
        //     $nota->name = $nota . "jeje"
        // }
        return $notas;
    }
    
    function getNoteById ($id){
        $nota = Nota::findOrFail($id);
        return $nota;
    }

}
