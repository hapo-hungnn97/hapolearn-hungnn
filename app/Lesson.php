<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Coures;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'requirement', 'content', 'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
