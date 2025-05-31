<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GenreController;

Route::get("/genres/{id}/events", [EventController::class,"index"])->name("events.index");
Route::get("/genres/create", [GenreController::class,"showCreateForm"])->name("genre.create");
Route::post("/genres/create", [GenreController::class,"create"]);
Route::get('/genres/{id}/events/create', [EventController::class,"showCreateForm"])->name('events.create');
Route::post('/genres/{id}/events/create', [EventController::class,"create"]);
Route::get('/genres/{id}/edit', [GenreController::class,"showEditForm"])->name('genres.edit');
Route::post('/genres/{id}/edit', [GenreController::class,"edit"]);
Route::get('/genres/{id}/events/{event_id}/edit', [EventController::class,"showEditForm"])->name('events.edit');
Route::post('/genres/{id}/events/{event_id}/edit', [EventController::class,"edit"]);
Route::get('/genres/{id}/delete', [GenreController::class,"showDeleteForm"])->name('genres.delete');
Route::post('/genres/{id}/delete', [GenreController::class,"delete"]);
//Route::get('/', function () {
//    return view('welcome');
//});
