@extends('layouts.app')
@section('title','courses-detail')
@section('content')
    <div class="head-detail container-fluid mt-4 d-flex align-items-center">
        <span class="pl-5">Home > All courses > Courses detail</span>
    </div>
    <div class="detail-courses container-fluid pb-5">
        <div class="container">
            <div class="row">
                <div class="left-course col-8 d-flex align-items-center justify-content-center mt-4">
                    <div class="course-banner">
                        <img class="img-fluid img-course-banner" src="{{ asset('storage/' . $courseDetail->image) }}" alt="">
                    </div>
                </div>
                <div class="right-course col-4 mt-4">
                    <div class="decs-course">
                        <div class="px-2">
                            <span class="title">Descriptions course</span>
                            <hr class="under">
                            <span class="content">
                                {{ $courseDetail->description }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="left-course-content col-8 mt-4 pb-5">
                    <div class="container mt-3 course-content">
                        <ul class="nav tab-head">
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-toggle="tab" href="#lesson">Lesson</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-toggle="tab" href="#teacher">Teacher</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" data-toggle="tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="lesson" class="container tab-pane active"><br>
                                <div class="d-flex flex-row">
                                    <a href="" class="btn btn-filter"><i class="fas fa-sliders-h"></i> Filter</a>
                                    <form action="{{ Route('course-detail.search', $courseDetail->id) }}" method="GET">
                                        <input type="text" class="form-control width-search ml-3" placeholder="Search..." name="search" value="{{ request('search') }}">
                                    </form>
                                    <i class="fas fa-search position-relative search-course"></i>
                                    @if(!($courseDetail->check_user))
                                    <a class="btn btn-take">Take this course</a>
                                    <input type="hidden" class="route" value="{{ Route('user.courses') }}">
                                    @endif
                                    <input type="hidden" class="user-id"  value="{{ Auth::user()->id }}">
                                    <input type="hidden" class="cour-id" value="{{ $id }}">
                                </div>
                                <div>
                                    <br>
                                    @foreach($lessons as $key => $lesson)
                                    <div class="lesson-list d-flex justify-content-between">
                                        @if($courseDetail->getUserLesson($lesson->id))
                                        <span class="text-primary">{{ ++$key }} . {{ $lesson->name }}</span>
                                        @else
                                        <span>{{ ++$key }} . {{ $lesson->name }}</span>
                                        @endif
                                        @if($courseDetail->check_user)
                                        <a href="{{ Route('lesson', [ $courseDetail->id, $lesson->id ]) }}" class="btn btn-learn">Learn</a>
                                        @endif
                                    </div>
                                    @endforeach
                                    <div class="pagination col-12 mt-5 d-flex justify-content-end">
                                        {{ $lessons->links('layouts.paginate') }}
                                    </div>
                                </div>
                            </div>
                            <div id="teacher" class="container tab-pane fade"><br>
                            <div class="title-teacher">Main Teacher</div>
                                <div class="container-fluid mt-3 pb-5">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('storage/' . $teacher->avatar) }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <div class="title-name mt-2">{{ $teacher->name }}</div>
                                            <div class="title-exp mt-1">Second Year Teacher</div>
                                            <div class="mt-2">
                                                <img class="img-g" src="/image/Groupa.png" alt="">
                                                <img class="img-f ml-2" src="/image/Vector.png" alt="">
                                                <img class="img-in ml-2" src="/image/Group84.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desc-exp mt-3">
                                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                                    </div>
                                </div>
                            </div>
                            <div id="reviews" class="container tab-pane fade"><br>
                                <div class="title">{{ $count->getCourseRateCount($id) }} Reviews</div>
                                <hr class="mt-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 rate d-flex flex-column align-items-center py-3 ml-3">
                                            <div class="star-rating">{{ $count->getAvgStarLesson(App\Models\Review::TYPE['course'], $id) }}</div>
                                            <div class="star">
                                                @for ($j = 0; $j < $count->getAvgStarLesson(App\Models\Review::TYPE['course'], $id); $j++)
                                                    <i class="fa fa-star ml-1"></i>
                                                @endfor
                                            </div>
                                            <div class="number-rating pb-3">{{ $count->getCourseRateCount($id) }} Ratings</div>
                                        </div>
                                        <div class="col-7 list-rate ml-3 d-flex flex-column align-items-around">
                                            <div class="d-flex flex-row mt-2">
                                                <div class="text-star mt-2">5 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar five-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="five-star-val" value="{{$count->getCourseRatingPercent(App\Models\Review::STAR['five'], $id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getCourseRatingCount(App\Models\Review::STAR['five'], $id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2">4 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar four-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="four-star-val" value="{{$count->getCourseRatingPercent(App\Models\Review::STAR['four'], $id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getCourseRatingCount(App\Models\Review::STAR['four'], $id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2">3 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar three-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="three-star-val" value="{{$count->getCourseRatingPercent(App\Models\Review::STAR['three'], $id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getCourseRatingCount(App\Models\Review::STAR['three'], $id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2">2 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar two-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="two-star-val" value="{{$count->getCourseRatingPercent(App\Models\Review::STAR['two'], $id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getCourseRatingCount(App\Models\Review::STAR['two'], $id) }}</div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="text-star mt-2 ml-1">1 stars</div>
                                                <div class="progress pro-rate ml-2">
                                                    <div class="progress-bar one-star" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <input type="hidden" class="one-star-val" value="{{$count->getCourseRatingPercent(App\Models\Review::STAR['one'], $id)}}">
                                                </div>
                                                <div class="txt-number ml-2">{{ $count->getCourseRatingCount(App\Models\Review::STAR['one'], $id) }}</div>
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
                                                <form action="{{ Route('lesson-review.destroy', $review->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn">Delete comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        @if (Auth::check() && Auth::id() == $review->user->id)
                                        <div class="more"><i class="fas fa-ellipsis-v"></i></div>
                                        @endif
                                    </div>
                                    <div class="content-cmt cmt-txt-{{ $review->id }} ml-3 mt-2">
                                        {{ $review->content }}
                                    </div>
                                    <div class="content-cmt cmt-form-{{ $review->id }} d-none ml-3 mt-2">
                                        <form action="{{ Route('lesson-review.update', $review->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <textarea class="form-control mt-1" rows="5" name="content">{{ $review->content }}</textarea>
                                        <div class="d-flex justify-content-end mt-3 pb-4">
                                            <a class="btn btn-send btn-return" reviewId="{{ $review->id }}">Return</a>
                                            <input type="submit" class="btn btn-send btn-edit ml-2" value="Edit">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                <form action="{{ Route('course-review.store', $id) }}" method="POST">
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
                <div class="right-course-content col-4 mt-5">
                    <div class="statistic-course">
                        <div class="element"><i class="fas fa-users pl-3 pr-2"></i> Learners : {{ $courseDetail->number_learner }}</div>
                        <hr>
                        <div class="element"><i class="fas fa-newspaper pl-3 pr-2"></i> Lessons : {{ $courseDetail->number_lesson }} lesson</div>
                        <hr>
                        <div class="element"><i class="fas fa-clock pl-3 pr-2"></i>Times : {{ $courseDetail->times }} hours</div>
                        <hr>
                        <div class="element"><i class="fas fa-key pl-3 pr-2"></i> Tags : {{ $courseDetail->tag_course }}</div>
                        <hr>
                        <div class="element"><i class="fas fa-money-bill pl-3 pr-2"></i> Price : {{ $courseDetail->price_course }}</div>
                    </div>
                    <div class="other-courses mt-3">
                        <div class="title d-flex align-items-center justify-content-center">Other Courses</div>
                        <div class="other mt-3">
                            @foreach($courseDetail->other_course as $key => $course)
                            <div class="course-element pl-2">
                                <a href="{{ Route('course.detail', $course->id) }}">{{ ++$key }} . {{ $course->name }}</a>
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
