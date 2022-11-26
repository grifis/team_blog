<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アブリ名</title>
    </head>
    <body>
        <h1>アプリ名</h1>
        <h2>投稿作成</h2>
        <form action="/questions" method="POST">
            @csrf
            <div>
                <h2>本文</h2>
                <textarea name="question[body]" placeholder="質問1000文字まで">{{ old('question.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/">戻る</a></div>
    </body>
</html>
