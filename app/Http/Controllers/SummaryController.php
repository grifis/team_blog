<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\NoteCategory;

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
    
   public function create(NoteCategory $notecategory)
    {
        return view('notes/create')->with(['notecategories' => $notecategory->get()]);
    }

    public function store(Note $note, Request $request)
    {
        $input = $request['note'];
        $post->fill($input)->save();
        return redirect('/notes/' . $note->id);
    }

    public function edit(Note $note)
    {
        return view('notes/edit')->with(['post' => $post]);
    }
}*/