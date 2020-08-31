<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lesson;
use App\Models\Tag;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTagCourseAttribute()
    {
        $tags = $this->tags;
        if (count($tags) > 0) {
            $tagName = '#' . $tags->first()->name;

            for ($i = 1; $i < count($tags); $i++) {
                $tagName .= ", " . '#' . $tags[$i]->name;
            }
        } else {
            $tagName = "";
        }

        return $tagName;
    }

    public function getPriceCourseAttribute()
    {
        $price = $this->price;
        if (empty($price)) {
            $price = 'Free';
        } else {
            $price .= "$";
        }

        return $price;
    }

    public function getOtherCourseAttribute()
    {
        return $this->where('id', '!=', $this->id)->take(5)->get();
    }
}
