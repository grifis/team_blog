<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    //answerに対するリレーション
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 30)
    {
        // updated_atで降順に並べたあと、limit_countで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
