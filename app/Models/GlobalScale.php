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

    function getNameScaleById($id){
        $scale = GlobalScale::findOrFail($id);
        return $scale;
    }
    
}
