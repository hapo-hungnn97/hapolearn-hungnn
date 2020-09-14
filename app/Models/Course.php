<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use App\Models\Review;
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

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id', 'id');
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

    public function getUserLesson($lessonId)
    {
        $check = $this->users()
            ->wherePivot('user_id', Auth::user()->id)
            ->wherePivot('course_id', $this->id)
            ->wherePivot('lesson_id', $lessonId)
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

    public function scopeFilterSearch($query, $data)
    {
        $result = null;

        if ($data['text']) {
            $query->where('name', 'like', '%' . $data['text'] . '%');
        }

        if ($data['status']) {
            if ($data['status'] == 'new') {
                $query->orderByDesc('id');
            } else {
                $query->orderBy('id');
            }
        }

        if ($data['teacher']) {
            $query->where('teacher_id', $data['teacher']);
        }

        if ($data['learner']) {
            if ($data['learner'] == 'desc') {
                $query->withCount(['users' => function ($que) {
                    $que->where('lesson_id', null);
                }])->orderByDesc('users_count');
            } else {
                $query->withCount(['users' => function ($que) {
                    $que->where('lesson_id', null);
                }])->orderBy('users_count');
            }
        }

        if ($data['times']) {
            if ($data['times'] == 'desc') {
                $query->orderByDesc('times');
            } else {
                $query->orderBy('times');
            }
        }

        if ($data['lesson']) {
            if ($data['lesson'] == 'desc') {
                $query->withCount('lessons')->orderByDesc('lessons_count');
            } else {
                $query->withCount('lessons')->orderBy('lessons_count');
            }
        }

        if ($data['tag']) {
            $query->join('course_tag', 'courses.id', '=', 'course_tag.course_id')
                ->where('course_tag.tag_id', $data['tag']);
        }

        if ($data['review']) {
            if ($data['review'] == 'desc') {
                $query->withCount(['reviews' => function ($que) {
                    $que->where('type', Review::TYPE['course']);
                }])->orderByDesc('reviews_count');
            } else {
                $query->withCount(['reviews' => function ($que) {
                    $que->where('type', Review::TYPE['course']);
                }])->orderBy('reviews_count');
            }
        }

        return $result;
    }
}
