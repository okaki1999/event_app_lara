<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GenreController;

Route::get("/genres/{id}/events", [EventController::class,"index"])->name("events.index");
Route::get("/genres/create", [GenreController::class,"showCreateForm"])->name("genre.create");
Route::post("/genres/create", [GenreController::class,"create"]);
//Route::get('/', function () {
//    return view('welcome');
//});
