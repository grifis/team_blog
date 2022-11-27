<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteCategory extends Model
{
    use HasFactory;

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function getByNoteCategory(int $limit_count = 5)
    {
        return $this->notes()->with('note_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
