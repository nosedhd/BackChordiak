<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;
use \App\Models\Language;

class NotesController extends Controller
{
    function getNotes (){
        $notas = Note::all();
        return $notas;
    }

    function getScalesNotes($tonicId, $intervals){
        // var_dump("tonic",$tonic);die;
        // var_dump("intervals",$intervals);die;
        $noteScales = [];
        $currentPosition = $tonicId;
        $i = 1;
        while ($i <= strlen($intervals)){
            $currentModPosition = $currentPosition%12;
            if ($currentModPosition == 0 && $currentPosition - 1 == 11){
                $currentPosition=12;
            }
            else if ($currentModPosition == 0 && $currentPosition - 1 == 0){
                $currentPosition=1;
            }else {
                $currentPosition = $currentModPosition;
            }
            array_push($noteScales, $currentPosition);
            $currentPosition = $currentPosition + intval($intervals[$i-1]);
            $i++;
        }

        $notesInScale = [];
        foreach ($noteScales as $position){
            $nota = Note::find($position);
            array_push($notesInScale, $nota);
        }

        return $notesInScale;

    }
    // function getScalesNotes($tonic, $intervals){
    //     $allNotes = Note::all();
    //     $scaleNotes = [];
    //     $currentPosition = $tonic->id;
    //     $continue = false;
    //     $initialIntervalPosition = 0;
    //     // array_push($scaleNotes, $currentPosition);
    //     foreach ($allNotes as $key => $note){
    //         if($continue){
    //             array_push($scaleNotes, $allNotes[($key - 1) + $intervals[$initialIntervalPosition]]);
    //             $initialIntervalPosition++;
    //             if($key == count($allNotes - 1) || $initialIntervalPosition <=  count($intervals - 1) ){
    //                 foreach ($allNotes as $key => $note){
                        

    //                 }                }
    //             if($key%12 == $tonic%12){
    //                 return $scaleNotes;
    //             }
    //         }
    //        if($key == $tonic->id){
    //         array_push($scaleNotes, $allNotes[$key]);
    //         $continue = true;
    //        }
           

    //         // if($key%12 == $tonic%12){
    //         //     return $scaleNotes;
    //         // }
    //     }
    //     // $scales =  Scale::all();
    //     return $notes;
    // }
}
