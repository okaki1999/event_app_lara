<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="my-navbar">
        <a class="my-navbar-brand" href="/">ToDo App</a>
    </nav>
</header>
<main>
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
                                <td><a href="#">編集</a></td>
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
                        <a href="#" class="btn btn-default btn-block">
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
                                <td>{{ $event->formatted_due_date }}</td>
                                <td><a href="#">編集</a></td>
                                <td><a href="#">削除</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
