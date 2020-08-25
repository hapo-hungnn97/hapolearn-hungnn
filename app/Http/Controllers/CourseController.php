<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('user.courses_list', compact('courses'));
    }

    public function searchCourse(Request $request)
    {
        $key = $request->search;
        $courses = Course::where('name', 'like','%'.$key.'%')
                    ->orwhere('description', 'like','%'.$key.'%')
                    ->paginate(config('variable.paginate'));
        return view('user.courses_list', compact('courses'));
    }
}
