<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Event;
use App\Http\Requests\CreateEvent;
use App\Http\Requests\EditEvent;

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
     *  【イベントの作成機能】
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

    /**
     *  【イベント編集ページの表示機能】
     *  機能：イベントIDをジャンル編集ページに渡して表示する
     *  
     *  GET /genres/{id}/events/{event_id}/edit
     *  @param int $id
     *  @param int $event_id
     *  @return \Illuminate\View\View
     */
    public function showEditForm(int $id, int $event_id)
    {
        $event = Event::find($event_id);

        return view('events/edit', [
            'event' => $event,
        ]);
    }

    /**
     *  【イベントの編集機能】
     *  機能：イベントが編集されたらDBを更新処理をしてイベント一覧にリダイレクトする
     *  
     *  POST /genres/{id}/events/{event_id}/edit
     *  @param int $id
     *  @param int $event_id
     *  @param EditEvent $request
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function edit(int $id, int $event_id, EditEvent $request)
    {
        $event = Event::find($event_id);

        $event->title = $request->title;
        $event->status = $request->status;
        $event->start_date = $request->start_date;
        $event->save();

        return redirect()->route('events.index', [
            'id' => $event->genre_id,
        ]);
    }
    
    /**
     *  【イベント削除ページの表示機能】
     *
     *  GET /genres/{id}/events/{event_id}/delete
     *  @param int $id
     *  @param int $event_id
     *  @return \Illuminate\View\View
     */
    public function showDeleteForm(int $id, int $event_id)
    {
        $event = Event::find($event_id);

        return view('events/delete', [
            'event' => $event,
        ]);
    }

    /**
     *  【イベントの削除機能】
     *
     *  POST /genres/{id}/events/{event_id}/delete
     *  @param int $id
     *  @param int $event_id
     *  @return \Illuminate\View\View
     */
    public function delete(int $id, int $event_id)
    {
        $event = Event::find($event_id);

        $event->delete();

        return redirect()->route('events.index', [
            'id' => $id
        ]);
    }
}
