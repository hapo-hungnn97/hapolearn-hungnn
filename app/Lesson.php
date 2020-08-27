<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'requirement', 'content', 'course_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
