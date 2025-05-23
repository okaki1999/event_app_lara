<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class EventController extends Controller
{
    public function index(int $id)
    {
        $genres = Genre::all();

        return view('events/index', [
            'genres' => $genres,
            "genre_id" => $id
        ]);
    }
}
