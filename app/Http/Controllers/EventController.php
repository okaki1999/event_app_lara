<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Event;

class EventController extends Controller
{
    public function index(int $id)
    {
        $genres = Genre::all();

        $genre = Genre::find($id);

        $events = $genre->events()->get();

        return view('events/index', [
            'genres' => $genres,
            "genre_id" => $id,
            "events" => $events
        ]);
    }
}
