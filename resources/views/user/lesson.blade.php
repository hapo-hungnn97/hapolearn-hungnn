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
                            <li class="nav-item mt-2">
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