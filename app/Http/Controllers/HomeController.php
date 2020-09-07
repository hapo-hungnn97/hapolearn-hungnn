<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'ASC')->limit(3)->get();
        $otherCourses = Course::orderBy('id', 'DESC')->limit(3)->get();

        return view('user.index', compact('courses', 'otherCourses'));
    }

    public function createUserCourse(Request $request)
    {
        CourseUser::create($request->all());
    }
}
