<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>アプリ名</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>アプリ名</h1>
        <div>
            <h2>質問</h2>
            <p>{{ $question->body }}</p>
        </div>
        <div>
            <p class="edit">[<a href="/questions/{{ $question->id }}/edit">この質問を編集する</a>]</p>
                <h2>回答</h2>
                @if($answers ->isNotEmpty())
                
                @foreach ($answers as $answer)
                    
                        <p>〇{{ $answer->body }}</p>
                        <p>　{{$answer->created_at}}</p>
                        <br>
                    
                @endforeach
                
                @else
                    
                    <p>まだ回答はありません。あなたが回答してみませんか？</p>
                
                @endif

                
                <form action="/answers/{{$question->id}}" method="POST">
                @csrf
                    <div>
                        <p>この質問に回答する</p>
                        <textarea name="answer[body]" placeholder="回答1000文字まで"></textarea>
                        <p class="body__error" style="color:red">{{ $errors->first('answer.body') }}</p>
                    </div>
                    <input type="submit" value="回答を送信"/>
                </form>
                
            <a href="/questions/index">戻る</a>
        </div>
    </body>
</html>
