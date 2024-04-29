<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $fillable = [
        'name',
    ];

    // public function arpegio()
    // {
    //     return $this->belongsTo(\App\Models\Arpegio::class);
    // }

}
