@extends('layouts.app')
@section('title','courses-detail')
@section('content')
    <div class="head-detail container-fluid mt-4 d-flex align-items-center">
        <span class="pl-5">Home > All courses > lesson</span>
    </div>
    <div class="lesson container-fluid pb-5">
        <div class="container">
            <div class="row">
                <div class="left-lesson col-8 d-flex justify-content-center mt-4">
                    <div class="lesson-banner">
                        <img class="img-fluid img-lesson-banner" src="/image/Rectangle7.png" alt="">
                    </div>
                </div>
                <div class="right-lesson col-4 mt-4">
                    <div class="statistic-lesson">
                        <div class="element"><i class="fas fa-tv pl-3 pr-2"></i> Course : {{ $course->name }}</div>
                        <hr>
                        <div class="element"><i class="fas fa-users pl-3 pr-2"></i> Learners : {{ $course->number_lesson }} lesson</div>
                        <hr>
                        <div class="element"><i class="fas fa-clock pl-3 pr-2"></i>Times : {{ $course->times }} hours</div>
                        <hr>
                        <div class="element"><i class="fas fa-key pl-3 pr-2"></i> Tags : {{ $course->tag_course }}</div>
                        <hr>
                        <div class="element"><i class="fas fa-money-bill pl-3 pr-2"></i> Price : {{ $course->price_course }}</div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-center pb-4">
                            <form action="{{ Route('course-user.destroy', $course->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-view" onclick="return confirm( '@lang('messages.alert.end')' )">End course</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="left-lesson-content col-8 pb-5">
                    <div class="container mt-3 lesson-content">
                        <ul class="nav tab-head">
                            <li class="nav-item mt-2">
                                <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-toggle="tab" href="#program">Program</a>
                            </li>
                            <li class="nav-item mt-2 rev">
                                <a class="nav-link" data-toggle="tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="container tab-pane active"><br>
                                <div class="title">Descriptions lesson</div>
                                <div class="content mt-1">
                                    {{ $lesson->description }}
                                </div>
                                <div class="title mt-4">Requirements</div>
                                <div class="content mt-1">
                                {{ $lesson->requirement }}
                                </div>
                                <div class="mt-5 pb-5">
                                    <span class="title-tag">Tag: </span>
                                    <span class="tag ml-2">#learn</span>
                                    <span class="tag ml-2">#learn</span>
                                    <span class="tag ml-2">#learn</span>
                                    <span class="tag ml-2">#learn</span>
                                </div>
                            </div>
                            <div id="program" class="container tab-pane fade"><br>
                                <div class="title">Program</div>
                                <div class="block-program mt-4 d-flex justify-content-between">
                                    <span class="name ml-2"><img src="image/doc.png" alt=""> Lesson</span>
                                    <span class="programs">Program learn HTML/CSS</span>
                                    <a href="" class="btn btn-preview">Preview</a>
                                </div>
                                <div class="block-program d-flex justify-content-between">
                                    <span class="name ml-2"><img src="image/PDF.png" alt=""> PDF</span>
                                    <span class="programs">Download course slides</span>
                                    <a href="" class="btn btn-preview">Preview</a>
                                </div>
                                <div class="block-program d-flex justify-content-between"> 
                                    <span class="name ml-2"><img src="image/video.png" alt=""> Video</span>
                                    <span class="programs">Download course videos</span>
                                    <a href="" class="btn btn-preview">Preview</a>
                                </div>
                            </div>
                            <div id="reviews" class="container tab-pane fade"><br>
                                <div class="title">{{ $count->getRateCount($lesson->id) }} Reviews</div>
                                <hr class="mt-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 rate d-flex flex-column align-items-center py-3 ml-3">
                                            <div class="star-rating">{{ $count->getAvgStarLesson($lesson->id) }}</div>
                                            <div class="star">
                                                @for ($j = 0; $j < $count->getAvgStarLesson($lesson->id); $j++)
                                                    <i class="fa fa-star ml-1"></i>
                                                @endfor
                                            </div>
                                            <div class="number-rating pb-3">{{ $count->getRateCount($lesson->id) }} Ratings</div>
                                        </div>
                                        <div class="col-7 list-rate ml-3 d-flex flex-column align-items-around">
                                            <div class="d-flex flex-row mt-2">
                                                <div class="text-star mt-2">5 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar five-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="five-star-val" value="{{$count->getRatingPercent(App\Models\Review::STAR['five'], $lesson->id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getLessonRatingCount(App\Models\Review::STAR['five'], $lesson->id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2">4 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar four-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="four-star-val" value="{{$count->getRatingPercent(App\Models\Review::STAR['four'], $lesson->id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getLessonRatingCount(App\Models\Review::STAR['four'], $lesson->id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2">3 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar three-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="three-star-val" value="{{$count->getRatingPercent(App\Models\Review::STAR['three'], $lesson->id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getLessonRatingCount(App\Models\Review::STAR['three'], $lesson->id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2">2 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar two-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="two-star-val" value="{{$count->getRatingPercent(App\Models\Review::STAR['two'], $lesson->id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getLessonRatingCount(App\Models\Review::STAR['two'], $lesson->id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2 ml-1">1 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar one-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="one-star-val" value="{{$count->getRatingPercent(App\Models\Review::STAR['one'], $lesson->id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getLessonRatingCount(App\Models\Review::STAR['one'], $lesson->id) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="show-review">Show all reviews <i class="fas fa-sort-down"></i></div>
                                @foreach ($reviews as $key => $review)
                                <div class="account-review-{{ $review->id }}">
                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                        <div class="title-cmt d-flex justify-content-around align-items-center">
                                            <span class="user-cmt"><img src="{{ asset('storage/' . $review->user->avatar) }}" alt="" class="img-fluid img-account rounded-circle">  {{ $review->user->name }}</span>
                                            <?php $star = $review->rating ?>
                                            <span class="star-cmt">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $star)
                                                    <i class="fa fa-star ml-1"></i>
                                                    @else
                                                    <i class="far fa-star ml-1"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                            <span class="date-cmt">{{ date('d-m-Y G:i', strtotime($review->created_at)) }}</span>
                                        </div>
                                        <div class="more-action">
                                            <div class="action action-edit my-2 btn" reviewId="{{ $review->id }}">Edit comment</div>
                                            <hr class="my-0">
                                            <div class="action action-delete my-2" reviewId="{{ $review->id }}">
                                                <button class="btn">Delete comment</button>
                                            </div>
                                        </div>
                                        <div class="more"><i class="fas fa-ellipsis-v"></i></div>
                                    </div>
                                    <div class="content-cmt cmt-txt-{{ $review->id }} ml-3 mt-2">
                                        {{ $review->content }}
                                    </div>
                                    <div class="content-cmt cmt-form-{{ $review->id }} d-none ml-3 mt-2">
                                        <form action="" class="form-edit-cmt">
                                        <textarea class="form-control mt-1" rows="5" name="content">{{ $review->content }}</textarea>
                                        <div class="d-flex justify-content-end mt-3 pb-4">
                                            <a class="btn btn-send btn-return" reviewId="{{ $review->id }}">Return</a>
                                            <a class="btn btn-send btn-edit ml-2" reviewId="{{ $review->id }}">Edit</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                <form action="{{ Route('review.store', $lesson->id) }}" method="POST">
                                    @csrf
                                    <div class="leave">Leave a Review</div>
                                    <div class="mess mt-2">Message</div>
                                    <textarea class="form-control mt-1" rows="4" name="content"></textarea>
                                    @if($errors->has('content'))
                                        <small class="text-danger">{{ $errors->first('content') }}</small>
                                    @endif
                                    <div class="d-flex flex-row mt-3">
                                        <div class="vote">Vote</div>
                                        <div class="rating ml-2">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                        </div>
                                        <div class="sta mt-1 ml-2">(Stars)</div>
                                    </div>
                                    @if($errors->has('rating'))
                                        <div class="mt-n2">
                                            <small class="text-danger">{{ $errors->first('rating') }}</small>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-end mt-3 pb-4">
                                        <button class="btn btn-send">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-lesson-content col-4 mt-2">
                    <div class="other-courses">
                        <div class="title d-flex align-items-center justify-content-center">Other Courses</div>
                        <div class="other mt-3">
                            @foreach($course->other_course as $key => $cour)
                            <div class="lesson-element pl-2">
                                {{ ++$key }} . {{ $cour->name }}
                            </div>
                            <hr>
                            @endforeach
                            <div class="d-flex align-items-center justify-content-center pb-4">
                                <a href="{{ Route('course') }}" class="btn btn-view">View all ours courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
