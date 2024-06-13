<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\GlobalScale;
use \App\Models\Note;

class GlobalScalesController extends Controller
{
    public function getScales (){
        $scales = new GlobalScale();
        $scale = $scales -> getScales();
        return $scale;
    }

    public function getScaleById($id){
        $scales = new GlobalScale();
        $scale = $scales -> getScaleById($id);
        return $scale;
    }
    
    public function getIntervalsScaleById($id){
        $scales = new GlobalScale();
        $scale = $scales -> getIntervalsScaleById($id);
        return $scale;
    }

    public function handleChordIndex($chordIndex, $scaleId){
        // var_dump($scaleId);die;
        $notesChord=[];
        $scale = getIntervalsScaleById($scaleId);
        // Creamos los objetos Note
        $firstNote = new Note();
        $secondNote = new Note();
        $thirdNote = new Note();

        $firstNote -> setPosition($chordIndex);
        $secondNote -> setPosition($secondNote -> evaluateModNote($chordIndex + intval($scale[2])));
        $thirdNote -> setPosition($thirdNote -> evaluateModNote($chordIndex + intval($scale[4])));

        array_push($notesChord, $firstNote);
        array_push($notesChord, $secondNote);
        array_push($notesChord, $thirdNote);

        
        return $notesChord;
    }
}
