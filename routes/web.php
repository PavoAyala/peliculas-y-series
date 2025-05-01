<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});

Route::resource('movies', MovieController::class);
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
