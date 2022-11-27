<x-app-layout>

<body>
    <h1>Quizに挑戦</h1>
     <div class='quizzes'>
            <div class='quiz'>
                <h2 class='title'>{{ $quiz->title }}</h2><h3>レベル:{{ $quiz->level }}</h3>
                <p class='body'>{{ $quiz->body }}</p>
            </div>
    </div>
    
    <div class="answer">
            <input type="number" id="answerNum" placeholder="回答を入力"/>
            <button id="answerBtn">回答する</button>
    </div>
    
    <script>
        document.getElementById("answerBtn").onclick = function() {
            let ans = document.getElementById('answerNum').value;
            ans = Number( ans );//Number型にキャスト
            let correctAns = @json($quiz->answer);
            console.log("test")
            async function test(){
                await axios.get("/test");
                window.location.href="/quizzes/index";
                
            }

            if(confirm('回答しますか？')) {
                if(ans === correctAns) {
                    window.alert('正解です');
                    test();
                }else{
                    window.alert('不正解です');
                }//end-ans-if
            }//end-confirm-if
            
        
        };//end-answerBtn-function
        
    </script>
</body>

</x-app-layout>