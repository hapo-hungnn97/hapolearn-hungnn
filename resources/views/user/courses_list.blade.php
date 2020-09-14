@extends('layouts.app')
@section('title','All courses')
@section('content')
<div class="courses-list container">
    <form action="{{ Route('course.search') }}" method="GET">
    <div class="courses-search mt-md-5 d-flex flex-row">
        <a class="btn btn-filter"><i class="fas fa-sliders-h"></i> Filter</a>
        <input type="text" class="form-control width-search ml-md-3 ml-2" placeholder="Search..." name="search" value="{{ $data['text'] }}">
        <i class="fas fa-search position-relative feedback"></i>
        <button class="btn-search-course">Tìm kiếm</button>
    </div>
    <div class="row mt-3 fil">
        <span class="txt-filter mt-3 ml-3">Lọc theo</span>
        <input type="hidden" name="status" value="" class="status">
        <span class="filter-detail mt-4">
            <a class="active-filter filter-new @if (isset($_GET['status']) && $_GET['status'] == 'new') acti @endif">Mới nhất</a>
        </span>
        <span class="filter-detail mt-4">
            <a class="active-filter filter-old @if (isset($_GET['status']) && $_GET['status'] == 'old') acti @endif">Cũ nhất</a>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" name="teacher_id">
                <option value="">Teacher</option>
                @foreach($teachers as $teacher)
                    @if(isset($data['teacher']) && $data['teacher'] == $teacher->id)
                        <option value="{{ $teacher->role }}" selected>{{ $teacher->name }}</option>
                    @else
                        <option value="{{ $teacher->role }}">{{ $teacher->name }}</option>
                    @endif
                @endforeach
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" name="learner">
                <option value="">Số người học</option>
                @if(isset($data['learner']) && $data['learner'] == 'asc')
                    <option value="asc" selected>Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @elseif(isset($data['learner']) && $data['learner'] == 'desc')
                    <option value="asc">Tăng dần</option>
                    <option value="desc" selected>Giảm dần</option>
                @else
                    <option value="asc">Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @endif
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control  select-fil" name="times">
                <option value="">Thời gian học</option>
                @if(isset($data['times']) && $data['times'] == 'asc')
                    <option value="asc" selected>Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @elseif(isset($data['times']) && $data['times'] == 'desc')
                    <option value="asc">Tăng dần</option>
                    <option value="desc" selected>Giảm dần</option>
                @else
                    <option value="asc">Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @endif
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" name="lesson">
                <option value="">Số bài học</option>
                @if(isset($data['lesson']) && $data['lesson'] == 'asc')
                    <option value="asc" selected>Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @elseif(isset($data['lesson']) && $data['lesson'] == 'desc')
                    <option value="asc">Tăng dần</option>
                    <option value="desc" selected>Giảm dần</option>
                @else
                    <option value="asc">Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @endif
            </select>
        </span>
        <br>
        <span class="form-group filter-tag mt-2">
            <select class="form-control select-fil" name="tag">
                <option value="">Tags</option>
                @foreach($tags as $tag)
                    @if(isset($data['tag']) && $data['tag'] == $tag->id)
                        <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                    @else
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endif
                @endforeach
            </select>
        </span>
        <span class="form-group filter-detail mt-2">
            <select class="form-control select-fil" name="review">
                <option value="">Review</option>
                @if(isset($data['review']) && $data['review'] == 'asc')
                    <option value="asc" selected>Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @elseif(isset($data['review']) && $data['review'] == 'desc')
                    <option value="asc">Tăng dần</option>
                    <option value="desc" selected>Giảm dần</option>
                @else
                    <option value="asc">Tăng dần</option>
                    <option value="desc">Giảm dần</option>
                @endif
            </select>
        </span>
    </div>
    </form>
    <div class="row">
        @foreach($courses as $course)
        <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
            <div class="block-content">
                <div class="row mt-4">
                    <div class="col-3">
                        <img class="img-fluid d-flex mx-lg-auto ml-2" src="{{ $course->image }}" alt="">
                    </div>
                    <div class="col-9 block-remove">
                        <div class="courses-title">
                            {{ $course->name }}
                        </div>
                        <div class="courses-desc mt-2">
                            {{ $course->description }}
                        </div>
                        <div class="d-flex justify-content-end mt-4 mr-n4">
                            <a href="{{ Route('course.detail', $course->id) }}" class="btn btn-more">More</a>
                        </div>
                    </div>
                </div>
                <div class="row text-center mt-4 pb-4">
                    <div class="col-4">
                        <div class="title">Learners</div>
                        <div class="data">16,882</div>
                    </div>
                    <div class="col-4">
                        <div class="title">Lessons</div>
                        <div class="data">2,689</div>
                    </div>
                    <div class="col-4">
                        <div class="title">Quizzes</div>
                        <div class="data">16,882</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="pagination col-12 mt-5 d-flex justify-content-end">
            {{ $courses->links('layouts.paginate') }}
        </div>
    </div>
</div>
@endsection
