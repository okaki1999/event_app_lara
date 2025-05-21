<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get("/folders/{id}/events", [EventController::class,"index"])->name("event.index");
Route::get('/', function () {
    return view('welcome');
});
