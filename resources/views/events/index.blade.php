@extends('layout')
@section('styles')
    <!-- 「flatpickr」の デフォルトスタイルシートをインポート -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- 「flatpickr」の ブルーテーマの追加スタイルシートをインポート -->
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダ</div>
                    <div class="panel-body">
                        <a href="{{ route('genre.create') }}" class="btn btn-default btn-block">
                            フォルダを追加する
                        </a>
                    </div>
                    <div class="list-group">
                        <table class="table foler-table">
                            @foreach($genres as $genre)
                            <tr>
                                <td>
                                    <a href="{{ route('events.index', ['id' => $genre->id]) }}" class="list-group-item {{ $genre_id === $genre->id ? 'active' : '' }}">
                                        {{ $genre->title }}
                                    </a>
                                </td>
                                <td><a href="{{ route('genres.edit', ['id' => $genre->id]) }}">編集</a></td>
                                <td><a href="#">削除</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </nav>
            </div>
            <div class="column col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">タスク</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="{{ route('events.create', ['id' => $genre_id]) }}" class="btn btn-default btn-block">
                            タスクを追加する
                        </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>状態</th>
                            <th>期限</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>
                                    <span class="label {{ $event->status_class }}">{{ $event->status_label }}</span>
                                </td>
                                <td>{{ $event->formatted_start_date }}</td>
                                <td><a href="{{ route('events.edit', ['id' => $event->genre_id, 'event_id' => $event->id]) }}">編集</a></td>
                                <td><a href="#">削除</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
