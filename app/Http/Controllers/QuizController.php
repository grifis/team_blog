<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\User;

class QuizController extends Controller
{
    public function index(Quiz $quiz)
    {
        $user = Auth::user();
        //expを後で$user->expに戻す
        return view('quiz/index')->with(['quizzes' => $quiz->get(), 'level' => $user->level, 'exp' => $user->exp]);
    }
    
    public function solve(Quiz $quiz)//ルートパラメータから送られたものをインスタンス化
    {
        return view('quiz/solve')->with(['quiz' => $quiz]);
    }
    
    public function give() 
    {
        return view('quiz/give');
    }
    
    public function store(Quiz $quiz, Request $request)
    {
        $input = $request['quiz'];
        $quiz->fill($input)->save();
        return redirect('quizzes/index');
    }
    
    public function test()
    {
        $user = Auth::user();
        $user->exp += 1;
        $user->save();
    }
    
}
