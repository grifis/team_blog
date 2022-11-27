<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    
    
    public function store(Question $question, Answer $answer, Request $request)
    {
        $input = $request['answer'];
        $answer->question_id = $question->id;
        
        $answer->fill($input)->save();
        return redirect('/questions/'. $question->id);
    }
}