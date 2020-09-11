<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function storeReview(ReviewRequest $request, $lessonId)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['type'] = Review::TYPE['lesson'];
        $data['target_id'] = $lessonId;
        Review::create($data);
        return redirect()->back();
    }

    public function updateLessonReview(Request $request, $id)
    {
        Review::find($id)->update([ 'content' => $request->content ]);
        return redirect()->back();
    }

    public function destroyLessonReview($id)
    {
        Review::find($id)->delete();
        return redirect()->back();
    }
}
