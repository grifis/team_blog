<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'note_category_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('note_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function note_category()
    {
        return $this->belongsTo(NoteCategory::class);
    }
  
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
