<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

Route::get('notes', [NotesController::class, 'index']);
Route::post('notes', [NotesController::class, 'store']);
Route::put('notes/{id}', [NotesController::class, 'update']);
Route::delete('notes/{id}', [NotesController::class, 'destroy']);

Route::get('/notes', function () {
    return "API works!";
});
