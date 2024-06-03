<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalScale extends Model
{
    use HasFactory;
    function getScales(){
        $scales =  GlobalScale::all();
        return $scales;
    }

    function getScaleById($id){
        $scale = GlobalScale::findOrFail($id);
        return $scale;
    }
    function getIntervalsScaleById($id){
        $scale = getScaleById($id);
        $interval = $scale -> intervals;
        return $interval;
    }
    
}
