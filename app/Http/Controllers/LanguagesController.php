<?php

namespace App\Http\Controllers;
use \App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    function getLanguages(){
        $languages =  Language::all();
        return $languages;
    }
}
