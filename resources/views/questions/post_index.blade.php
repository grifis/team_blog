<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Q&A') }}
        </h2>
    </x-slot>
    <body>
        <h1>アプリ名</h1>
        <h2>Q＆A</h2>
        <form action="/questions" method="POST">
            @csrf
            <div>
                <h2>質問</h2>
                <textarea name="question[body]" placeholder="質問1000文字まで">{{ old('question.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
            </div>
            <input type="submit" value="質問する"/>
        </form>
        
        <div>
            <h2>質問一覧</h2>
            @foreach ($questions as $question)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        <a href="/questions/{{ $question->id }}">{{ $question->title }}</a>
                    </p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $questions->links() }}
        </div>
    </body>
    
</x-app-layout>