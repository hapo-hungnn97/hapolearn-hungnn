<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_Tag extends Model
{
    use SoftDeletes;
    
    protected $table ="course_tag";
    protected $fillable = [
        'course_id', 'tag_id',
    ];
}
