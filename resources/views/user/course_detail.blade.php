@extends('layouts.app')
@section('title','courses-detail')
@section('content')
    <div class="head-detail container-fluid mt-4 d-flex align-items-center">
        <span class="pl-5">Home > All courses > Courses detail</span>
    </div>
    <div class="detail-courses container-fluid">
        <div class="container">
            <div class="row">
                <div class="left-course col-8 d-flex align-items-center justify-content-center mt-4">
                    <div class="course-banner">
                        <img class="img-fluid img-course-banner" src="/image/Rectangle7.png" alt="">
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
                                    <form action="{{ Route('course-detail.search', $courseDetail->id) }}" method="POST">
                                        @csrf
                                        <input type="text" class="form-control width-search ml-3" placeholder="Search..." name="search">
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
                                <div class="container-fluid mt-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="image/Ellipse 32.png" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <div class="title-name mt-2">Luu Trung Nghia</div>
                                            <div class="title-exp mt-1">Second Year Teacher</div>
                                            <div class="mt-2">
                                                <img class="img-g" src="image/Groupa.png" alt="">
                                                <img class="img-f ml-2" src="image/Vector.png" alt="">
                                                <img class="img-in ml-2" src="image/Group 84.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desc-exp mt-3">
                                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                                    </div>
                                </div>
                            </div>
                            <div id="reviews" class="container tab-pane fade"><br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-course-content col-4 mt-5">
                    <div class="statistic-course">
                        <div class="element"><i class="fas fa-users pl-3 pr-2"></i> Learners : 500</div>
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
                                {{ ++$key }} . {{ $course->name }}
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
