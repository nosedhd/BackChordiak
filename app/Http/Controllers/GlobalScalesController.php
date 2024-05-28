<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\GlobalScale;

class GlobalScalesController extends Controller
{
    function getScales (){
        $scales = new GlobalScale();
        $scale = $scales -> getScales();
        return $scale;
    }

    function getNameScaleById($id){
        $scales = new GlobalScale();
        $scale = $scales -> getNameScaleById($id);
        return $scales;
    }
    public function handleChordIndex(Request $request){
        $notesChord=[];
        $chordIndex = $request->input('chordIndex');
        $escaleId = $request->input('escaleId');
        $scale = getNameScaleById(escaleId);
        $secondNote = 0;
        $thirdNote = 0;

        $chordModIndex = $chordIndex % 12;
        if ($chordModIndex == 0){
            // $secondNote= ;


        }

        
        return response()->json(['chordIndex' => $chordIndex]);
    }
}
