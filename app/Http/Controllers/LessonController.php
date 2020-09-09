<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Auth;

class LessonController extends Controller
{
    public function showLesson($courseId, $lessonId)
    {
        $course = Course::find($courseId);
        $lesson = $course->lessons()->find($lessonId);
        if(!($course->getUserLesson($lessonId))) {
            Auth::user()->courses()->attach($courseId, ['lesson_id' => $lessonId] );
        } 

        return view('user.lesson', compact('course', 'lesson'));
    }
}
