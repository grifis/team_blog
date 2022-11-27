<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Comment extends Model
{
 
    protected $fillable = [
        'note_id',
        'comment', 
    ];
 
    /**
     * 
     */
    public function note()
    {
       return $this->belongsTo(Note::class);
    }
}