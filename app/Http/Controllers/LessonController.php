<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;
use Auth;

class LessonController extends Controller
{
    public function showLesson($courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = $course->lessons()->find($lessonId);
        $reviews = Review::with('user')
            ->where('type', Review::TYPE['lesson'])
            ->where('target_id', $lessonId)
            ->get();
        $count = Review::first();
        
        if (!($course->getUserLesson($lessonId))) {
            Auth::user()->courses()->attach($courseId, ['lesson_id' => $lessonId]);
        }

        return view('user.lesson', compact('course', 'lesson', 'reviews', 'count'));
    }
}
