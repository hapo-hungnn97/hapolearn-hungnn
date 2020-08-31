<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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
        $courses = Course::where('name', 'like', '%' . $key . '%')
            ->orwhere('description', 'like', '%' . $key . '%')
            ->paginate(config('variable.paginate'));
        return view('user.courses_list', compact('courses'));
    }

    public function showCourseDetail($id)
    {
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->paginate(config('variable.course'));
        return view('user.course_detail', compact('courseDetail', 'lessons'));
    }

    public function searchCourseDetail(Request $request, $id)
    {
        $key = $request->search;
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->where('name', 'like', '%' . $key . '%')
            ->paginate(config('variable.course'));
        return view('user.course_detail', compact('courseDetail', 'lessons'));
    }
}
