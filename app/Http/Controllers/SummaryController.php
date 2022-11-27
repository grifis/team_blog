<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\NoteCategory;
use Cloudinary;

class SummaryController extends Controller
{
    public function index(Note $note)
    {
        return view('notes/index')->with(['notes' => $note->getPaginateByLimit()]);
    }

  public function show(Note $note)
    {
        return view('notes/show')->with(['note' => $note]);
    }
  
   public function category_index(NoteCategory $Notecategory)
    {
         return view('notes_categories/category_index')->with(['notes' => $Notecategory->getByNoteCategory()]);
    }
   
   public function create(NoteCategory $Notecategory)
    {
        return view('notes/create')->with(['notecategories' => $Notecategory->get()]);
    }

    public function cloudinary()
      {
        return view('notes/create');  //cloudinary.blade.phpを表示
         }
 
    public function cloudinary_store(Request $request)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($image_urll);  //画像のURLを画面に表示
    }
 
    public function store(Note $note, Request $request)
    {
        $input = $request['note'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image' => $image_url];
        $note->fill($input)->save();
        return redirect('/notes/index');
    }

    public function edit(Note $note)
    {
        return view('notes/edit')->with(['note' => $note]);
    }
}