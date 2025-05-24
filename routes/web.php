<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get("/genres/{id}/events", [EventController::class,"index"])->name("event.index");
Route::get("/genres/create", [GenreController::class,"showcreateForm"])->name("genre.create");
Route::post("/genres/create", [GenreController::class,"create"]);
//Route::get('/', function () {
//    return view('welcome');
//});
