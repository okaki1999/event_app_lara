<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get("/genres/{id}/events", [EventController::class,"index"])->name("event.index");
//Route::get('/', function () {
//    return view('welcome');
//});
