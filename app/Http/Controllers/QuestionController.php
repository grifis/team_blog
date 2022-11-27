<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function index(Question $question)
    {
        return view('questions/index2525')->with(['questions' => $question->getPaginateByLimit()]);
    }
    
    public function store(Question $question, Request $request)
    {
        $input = $request['question'];
        $question->fill($input)->save();
        return redirect('/questions/' . $question->id);
    }
    
    public function show(Question $question)
    {
        //question.phpの方からリレーションメソッドを呼び出す、値だけならブランケットなし
        $answers = $question->answers;
        return view('questions/show')->with(['question' => $question, 'answers' => $answers]);
    }
    
    public function edit(Question $question)
    {
        return view('questions/edit')->with(['question' => $question]);
    }
    
    public function update(Question $question, Request $request)
    {
        $input_question = $request['question'];
        $question->fill($input_question)->save();

        return redirect('/questions/' . $question->id);
    }
}
