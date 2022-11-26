<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Summary</title>
    </head>
    <body>
        <h2>投稿作成</h2>
        <p>学習したことをまとめて、発表してみましょう。</p>
        <form action="/notes/index" method="POST">
            @csrf
            <div>
                <h2>タイトル</h2>
                <input type="text" name="note[title]" placeholder="タイトル" value="{{ old('note.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('note.title') }}</p>
           </div>
            <h2>カテゴリー</h2>
                <select name="note[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            <div>
                <h2>本文</h2>
                <textarea name="note[body]" >{{ old('note.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('note.body') }}</p>
            </div>
            <h2>画像アップロード</h2>
            
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/notes/index">戻る</a></div>
    </body>
</html>
