<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Tag;
use Auth;

class CourseController extends Controller
{
    public function index()
    {
        $data['search'] = null;
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        $courses = Course::paginate(config('variable.paginate'));
        return view('user.courses_list', compact('courses', 'data', 'teachers', 'tags'));
    }

    public function searchCourse(Request $request)
    {
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        $data = $request->all();

        $courses = Course::query()->FilterSearch($data)->paginate(config('variable.paginate'));

        return view('user.courses_list', compact('courses', 'data', 'teachers', 'tags'));
    }

    public function showCourseDetail($id)
    {
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->paginate(config('variable.paginate'));
        
        return view('user.course_detail', compact('courseDetail', 'lessons', 'id'));
    }

    public function searchCourseDetail(Request $request, $id)
    {
        $key = $request->search;
        $courseDetail = Course::find($id);
        $lessons = $courseDetail->lessons()
            ->where('name', 'like', '%' . $key . '%')
            ->paginate(config('variable.paginate'));
        return view('user.course_detail', compact('courseDetail', 'lessons'));
    }

    public function destroyUserCourse($id)
    {
        Auth::user()->courses()->detach($id);
        return redirect()->route('course');
    }
}
