<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;
use \App\Models\Language;

class NotesController extends Controller
{
    function getNotes (){
        $note = new Note();
        $notes = $note->getNotes();
        return $notes;
    }

    function getScalesNotes($tonicId, $intervals){
        $note = new Note();
        $notesInScale = $note->getScalesNotes($tonicId, $intervals);
        return $notesInScale;
    }
}
