<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGenre;

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
}
