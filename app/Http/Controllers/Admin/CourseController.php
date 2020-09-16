<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Tag;
use App\Models\CourseTag;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchCourse(Request $request)
    {
        $courses = Course::where('name', 'like', '%' . $request->search . '%')
            ->paginate(config('variable.paginate'));
            
        return view('admin.course.index', compact('courses'));
    }
     
    public function create()
    {
        $tags = Tag::all();
        return view('admin.course.add', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = uniqid() . "_" . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('public', $image);
        }
        DB::beginTransaction();
        try {
            Course::create([
                'name' => $request->name,
                'description' => $request->description,
                'times' => $request->times,
                'quizze' => $request->quizze,
                'price' => $request->price,
                'image' => $image,
                'teacher_id' => Auth::user()->id,
            ]);

            $course = Course::where('name', $request->name)->first();
            $tags = $request->tagId;

            if (!empty($tags)) {
                foreach ($tags as $tagId) {
                    $course->tags()->attach($tagId);
                }
            }

            DB::commit();

            return redirect()->route('admin.courses.index')->with('message', __('messages.success.store'));
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());

            return redirect()->route('admin.courses.index')->with('message', __('messages.fail.store'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = uniqid() . "_" . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('public', $image);
            $imageDelete = Course::find($id)->$image;
            Storage::delete('public/' . $imageDelete);
            $data['image'] = $image;
        }

        Course::find($id)->update($data);

        return redirect()->route('admin.courses.index')->with('message', __('messages.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('admin.courses.index')->with('message', __('messages.success.delete'));
    }
}
