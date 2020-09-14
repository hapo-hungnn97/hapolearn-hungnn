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
        $data['text'] = null;
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        $courses = Course::paginate(config('variable.paginate'));
        return view('user.courses_list', compact('courses', 'data', 'teachers', 'tags'));
    }

    public function searchCourse()
    {
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();

        $data = [
            'text' => $_GET['search'],
            'status' => $_GET['status'],
            'teacher' => $_GET['teacher_id'],
            'times' => $_GET['times'],
            'lesson' => $_GET['lesson'],
            'learner' => $_GET['learner'],
            'tag' => $_GET['tag'],
            'review' => $_GET['review'],
        ];
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
