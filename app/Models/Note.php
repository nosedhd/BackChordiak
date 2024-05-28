<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    function getNotes (){
        $notes = Note::all();
        return $notes;
    }

    function getScalesNotes($tonicId, $intervals){
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
    

    // public function arpegio()
    // {
    //     return $this->belongsTo(\App\Models\Arpegio::class);
    // }

}
