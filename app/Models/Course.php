<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Auth;

class Course extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'description', 'image', 'times', 'price', 'quizze', 'teacher_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getCheckUserAttribute()
    {
        $check = $this->users()
            ->wherePivot('user_id', Auth::user()->id)
            ->wherePivot('course_id', $this->id)
            ->exists();
        return $check;
    }

    public function getUserLesson($id)
    {
        $check = $this->users()
            ->wherePivot('user_id', Auth::user()->id)
            ->wherePivot('course_id', $this->id)
            ->wherePivot('lesson_id', $id)
            ->exists();
        return $check;
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
        return $this->where('id', '!=', $this->id)->take(config('variable.course'))->get();
    }
}
