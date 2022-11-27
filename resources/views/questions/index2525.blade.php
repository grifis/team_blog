<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Q&A') }}
        </h2>
    </x-slot>

    <body class="">
        <h1 class="text-xl font-bold">質問</h1>
        <form action="/questions" method="POST">
            @csrf
            <div>
                <textarea 
                    name="question[body]" 
                    placeholder="質問1000文字まで" 
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                       
                        {{ old('question.body') }}
                        
                </textarea>
                <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
            </div>
            <!--input type="submit" value="質問する"/-->
            <button class="bg-gray-600 hover:bg-gray-500 text-white rounded px-4 py-2" type="submit">質問する</button>
        </form>
        
        <div>
            <h2 class="text-xl font-bold">質問一覧</h2>
            @foreach ($questions as $question)
                <div style='border:solid 1px; margin-bottom: 10px;' class="bg-gray-400 shadow-xl">
                    <p>
                        <a href="/questions/{{ $question->id }}">{{ $question->body }}</a>
                    </p>
                    <p>
                        <a href="/questions/{{ $question->id }}">{{ $question->updated_at }}</a>
                    </p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $questions->links() }}
        </div>
    </body>
</x-app-layout>

    
</html>
