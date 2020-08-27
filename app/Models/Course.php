<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lesson;

class Course extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'description', 'image', 'times', 'price', 'quizze', 'teacher_id'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
