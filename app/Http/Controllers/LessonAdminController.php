<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LessonRequest;
use App\Course;
use App\Lesson;

class LessonAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showListCourse()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('admin.lesson.list', compact('courses'));
    }

    public function index($id)
    {
        $course = Course::findOrFail($id);
        $courseName = $course->name;
        $lessons = $course->lessons()->paginate(config('variable.paginate'));
        return view('admin.lesson.index', compact('lessons', 'courseName', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.lesson.add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request, $id)
    {
        Lesson::create([
            'name' => $request->name,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'content' => $request->content,
            'course_id' => $id,
        ]);

        return redirect()->route('admin.lesson.index', $id)->with('message', __('messages.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($courseId, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        return view('admin.lesson.edit', compact('lesson', 'courseId', 'lessonId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, $courseId, $lessonId)
    {
        $data = $request->all();
        Lesson::find($lessonId)->update($data);
        return redirect()->route('admin.lesson.index', $courseId)->with('message', __('messages.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId, $lessonId)
    {
        Lesson::find($lessonId)->delete();
        return redirect()->route('admin.lesson.index', $courseId)->with('message', __('messages.success.delete'));
    }
}
