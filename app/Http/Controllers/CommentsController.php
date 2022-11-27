<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest; 
use App\Models\Comment; 
 
class CommentsController extends Controller
{
    /**
     * バリデーション、登録データの整形など
     */
    public function store(CommentRequest $request)
    {

        $savedata = $request->all();
 
        $comment = new Comment;
        $comment->fill($savedata);
        $comment->save();
 
         return redirect('/notes/index' . $request->note_id);
    }
}