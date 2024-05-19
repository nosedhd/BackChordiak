<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\ScalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::get('/notas', [NotesController::class, 'getNotes']);
Route::get('/idiomas', [LanguagesController::class, 'getLanguages'])->name('idiomas');
Route::get('/scales', [ScalesController::class, 'getScales']);
Route::get('/getScaleNotes/{tonic}/{intervals}', [NotesController::class, 'getScalesNotes']);
