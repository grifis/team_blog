<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Give a quiz</title>
</head>
<body>
    <h1>Quizを投稿する</h1>
    
        <form action="/quizzes" method="POST">
            @csrf
            <div class="quiz_title">
                <h2>タイトル</h2>
                <input type="text" name="quiz[title]" placeholder="クイズタイトルを入力"/>
            </div>
            <div class="quiz_body">
                <h2>問題文</h2>
                <textarea name="quiz[body]" placeholder="クイズ文を入力"></textarea>
                <p>問題文の後に選択肢を必ず追加してください。</p>
                <p>例: (問題文) 1.答A, 2.答B, 3.答C</p>
            </div>
            <div class="quiz_level">
                <h2>レベル</h2>
                <input type="number" name="quiz[level]" placeholder="例:1"/>
            </div>
            <div class="quiz_answer">
                <h2>答え</h2>
                <input type="number" name="quiz[answer]" placeholder="答えの選択肢の番号を入力"/>
            </div>
            <br>
            <input type="submit" value="投稿"/>
        </form>
    
</body>
</html>