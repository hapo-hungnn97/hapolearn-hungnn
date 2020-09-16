<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AvatarUpdateRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Review;
use Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $courseCount = Course::all()->count();
        $lessonCount = Lesson::all()->count();
        $userCount = User::where('role', User::ROLE['user'])
                ->whereHas('courses')
                ->count();
        $courses = Course::orderBy('id', 'ASC')->limit(3)->get();
        $otherCourses = Course::orderBy('id', 'DESC')->limit(3)->get();
        $reviews = Review::where('type', Review::TYPE['course'])->with(['user', 'course'])->get();

        return view('user.index', compact(
            'courses',
            'otherCourses',
            'courseCount',
            'lessonCount',
            'userCount',
            'reviews'
        ));
    }

    public function createUserCourse(Request $request)
    {
        $user = User::find($request->user_id);
        $user->courses()->attach($request->course_id);
        
        return response()->json('success', 201);
    }

    public function showProfile()
    {
        $user = Auth::user();
        $courses = $user->courses()->wherePivot('lesson_id', null)->get();

        return view('user.profile', compact('user', 'courses'));
    }

    public function editProfile(ProfileRequest $request)
    {
        $userId = Auth::user()->id;
        User::find($userId)->update($request->all());

        return redirect()->route('profile')->with('message', __('messages.success.update'));
    }

    public function updateAvatar(AvatarUpdateRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = uniqid() . "_" . $request->avatar->getClientOriginalName();
            $request->file('avatar')->storeAs('public', $avatar);
            $image = Auth::user()->avatar;
            Storage::delete('public/' . $image);
            Auth::user()->update(['avatar' => $avatar]);
        }

        return redirect()->route('profile');
    }
}
