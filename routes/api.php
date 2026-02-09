<?php

use Illuminate\Support\Facades\Route;

Route::get('notes', [NotesController::class, 'index']);
Route::post('notes', [NotesController::class, 'store']);
