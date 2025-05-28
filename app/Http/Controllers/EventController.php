<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Event;
use App\Http\Requests\CreateEvent;

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

    /**
     *  【イベント作成ページの表示機能】
     *
     *  GET /genres/{id}/events/create
     *  @param int $id
     *  @return \Illuminate\View\View
     */
    public function showCreateForm(int $id)
    {
        return view('events/create', [
            'genre_id' => $id
        ]);
    }

    /**
     *  【タスクの作成機能】
     *
     *  POST /genres/{id}/events/create
     *  @param int $id
     *  @param CreateEvent $request
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function create(int $id, CreateEvent $request)
    {
        $genre = Genre::find($id);

        $event = new Event();
        $event->title = $request->title;
        $event->start_date = $request->start_date;
        $genre->events()->save($event);

        return redirect()->route('events.index', [
            'id' => $genre->id,
        ]);
    }
}
