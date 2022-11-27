<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>quiz home</title>
</head>
<body>
    <h1>Quizzes</h1>
    <div class="level&exp">
        <h2>あなたの現在のレベル: {{ floor(($exp + 10) / 10) }}</h2>
        <meter id="meter_bar" min="0" max="10" value="0"></meter>
        <output id="meter_rate">0 %</output>
    </dev>
    <h2><a href="/quizzes/give">【quizを投稿してみる】</a></h2>
    <h2>【レベル別】: レベル1, レベル2, レベル3</h2>
    
    <h2><投稿された問題></h2>
    <div class='quizzes'>
        @foreach ($quizzes as $quiz)
            <div class='quiz'>
                <h2 class='title'><a href="/quizzes/{{ $quiz->id }}">{{ $quiz->title }}</a></h2><h3>レベル:{{ $quiz->level }}</h3>
                <p class='body'>{{ $quiz->body }}</p>
            </div>
        @endforeach
    </div>
    
    <script>
        //メーターを実装
        let meterObj = document.getElementById('meter_bar');
        let rateObj = document.getElementById('meter_rate');
        let exp = @json($exp);
        let level = ((exp + 10) / 10 | 0);
        console.log('level = ', level);
        let rate = (exp - (10 * (level - 1))) * 10;
        meterObj.value = String(rate/10);
        rateObj.innerHTML = ' ' + rate + '%';
    </script>
    
</body>
</html>