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
            <p>カテゴリー：<a href="/categories/{{ $note->category->id }}">{{ $note->category->name }}</a></p>
        </div>
        <div>
            <a href="/notes/index">戻る</a>
        </div>
    </body>
</html>