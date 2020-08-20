<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'times', 'price', 'quizze', 'teacher_id'
    ];
}
