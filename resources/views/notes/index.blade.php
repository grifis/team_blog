<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Summary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Summary</h1>
        <a href='notes/create'>投稿する</a> 
        <a href='notes/edit'>編集する</a>
        <h2>投稿一覧画面</h2>
        <div class='notes'>
            <div class='note'>
                @foreach ($notes as $note)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        Title：<a href="notes/{{ $note->id }}">{{ $note->title }}</a>
                    </p>
                    
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>