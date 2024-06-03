<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    
    use HasFactory;
    // Llamamos la tabla notas de nuestra base de datos 
    protected $table = 'notes';

    // Atributos de la clase
    private $position;
    private $name;

    // Constructor para inicializar los atributos
    public function __construct($position = null, $name = null)
    {
        $this->position = $position;
        $this->name = $name;
    }

    // Métodos getter para acceder a los atributos
    public function getPosition()
    {
        return $this->position;
    }

    public function getName()
    {
        return $this->name;
    }

    // Métodos setter para modificar los atributos
    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // Funciones propias de la clase Note
    function getNotes (){
        $notes = Note::all();
        return $notes;
    }

    function evaluateModNote ($evaluateNote){
        $modNote = $evaluateNote%12;
        if ($modNote == 0 && $evaluateNote - 1 == 11){
            $currentNote=12;
        }
        else if ($modNote == 0 && $evaluateNote - 1 == 0){
            $currentNote=1;
        }else {
            $currentNote = $modNote;
        }
        return $currentNote;
    }

    function getScalesNotes($tonicId, $intervals){
        $noteScales = [];
        $currentPosition = $tonicId;
        $i = 1;
        while ($i <= strlen($intervals)){
            $currentPosition = $this -> evaluateModNote($currentPosition);
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
