<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アプリ名</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/questions/{{ $question->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='question[body]' value="{{ $question->body }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <a href="/questions/index">戻る</a>
    </body>
</html>
