<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGenre;
use App\Http\Requests\EditGenre;

class GenreController extends Controller
{
    /**
     *  【ジャンル作成ページの表示機能】
     *
     *  GET /folders/create
     *  @return \Illuminate\View\View
     */
    public function showCreateForm()
    {
        return view('genres/create');
    }

    /**
     *  【ジャンルの作成機能】
     *
     *  POST /genres/create
     *  @param Request $request （リクエストクラスの$request）
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateGenre $request)
    {
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->save();

        return redirect()->route('events.index', [
            'id' => $genre->id,
        ]);
    }

    /**
     *  【ジャンル編集ページの表示機能】
     *
     *  GET /genres/{id}/edit
     *  @param int $id
     *  @return \Illuminate\View\View
     */
    public function showEditForm(int $id)
    {
        $genre = Genre::find($id);

        return view('genres/edit', [
            'genre_id' => $genre->id,
            'genre_title' => $genre->title,
        ]);
    }

    /**
     *  【ジャンルの編集機能】
     *
     *  POST /genres/{id}/edit
     *  @param int $id
     *  @param EditEvent $request
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function edit(int $id, EditGenre $request)
    {
        $genre = genre::find($id);

        $genre->title = $request->title;
        $genre->save();

        return redirect()->route('events.index', [
            'id' => $genre->id,
        ]);
    }
}
