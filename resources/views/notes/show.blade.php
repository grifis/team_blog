<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>詳細画面</h1>
        <div>
            <p>タイトル：{{ $note->title }}</p>
            <p>本文：{{ $note->body }}</p>
            <img src={{ $note->image }} >
            <p>カテゴリー：<a href="/notes_categories/{{ $note->note_category->id }}">{{ $note->note_category->name }}</a></p>
        </div>
        <form action="/notes/{note}" method=post>
            @csrf
        <div>
            <h2>コメント投稿</h2>
             <input name="note_id" type="hidden" value={{ $note->id }}>
             <textarea name="comment" placeholder=""></textarea>
     　　<input type="submit" value=投稿>
     　　</form>
        </div>
        
        <div>
            <h2>コメント一覧</h2>
              @foreach  ($note->comments as $comment)
                <div>
                    <p>
                        {{ $comment->created_at}}
                        {{ $comment->comment }}
                    </p>
                    </div>
              @endforeach
        </div>
        <div>
            <a href="/notes/index">戻る</a>
        </div>
    </body>
</html>