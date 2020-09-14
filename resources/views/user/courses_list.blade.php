@extends('layouts.app')
@section('title','All courses')
@section('content')
<div class="courses-list container">
    <form action="{{ Route('course.search') }}" method="GET">
    <div class="courses-search mt-md-5 d-flex flex-row">
        <a class="btn btn-filter"><i class="fas fa-sliders-h"></i> Filter</a>
        <input type="text" class="form-control width-search ml-md-3 ml-2" placeholder="Search..." name="search" value="{{ request('search') }}">
        <i class="fas fa-search position-relative feedback"></i>
        <button class="btn-search-course">Tìm kiếm</button>
    </div>
    <div class="row mt-3 fil">
        <span class="txt-filter mt-3 ml-3">Lọc theo</span>
        <input type="hidden" name="status" value="" class="status">
        <span class="filter-detail mt-4">
            <a class="active-filter filter-new @if (request('status') == 'new') acti @endif">Mới nhất</a>
        </span>
        <span class="filter-detail mt-4">
            <a class="active-filter filter-old @if (request('status') == 'old') acti @endif">Cũ nhất</a>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" name="teacher">
                <option value="">Teacher</option>
                @foreach($teachers as $teacher)
                    @if(request('teacher') == $teacher->id)
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
                <option value="asc" @if (request('learner') == 'asc') selected @endif>Tăng dần</option>
                <option value="desc" @if (request('learner') == 'desc') selected @endif>Giảm dần</option>
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control  select-fil" name="times">
                <option value="">Thời gian học</option>
                <option value="asc" @if (request('times') == 'asc') selected @endif>Tăng dần</option>
                <option value="desc" @if (request('times') == 'desc') selected @endif>Giảm dần</option>
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" name="lesson">
                <option value="">Số bài học</option>
                <option value="asc" @if (request('lesson') == 'asc') selected @endif>Tăng dần</option>
                <option value="desc" @if (request('lesson') == 'desc') selected @endif>Giảm dần</option>
            </select>
        </span>
        <br>
        <span class="form-group filter-tag mt-2">
            <select class="form-control select-fil" name="tag">
                <option value="">Tags</option>
                @foreach($tags as $tag)
                    @if(request('tag') == $tag->id)
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
                <option value="asc" @if (request('review') == 'asc') selected @endif>Tăng dần</option>
                <option value="desc" @if (request('review') == 'desc') selected @endif>Giảm dần</option>
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
                        <img class="img-fluid img-cou rounded-circle d-flex mx-lg-auto ml-2" src="{{ asset('storage/' . $course->image) }}" alt="">
                    </div>
                    <div class="col-9 block-remove">
                        <div class="courses-title">
                            {{ $course->name }}
                        </div>
                        <div class="courses-desc mt-2">
                            {{ $course->description }}
                        </div>
                        <div class="d-flex justify-content-end mt-4 mr-n4">
                            <a href="{{ Route('course.detail', $course->id) }}" class="btn btn-more" {{ Auth::user() ? '' : 'data-toggle=modal data-target=#signModal' }}>More</a>
                            <input type="hidden"  value="{{ $course->id }}">
                        </div>
                    </div>
                </div>
                <div class="row text-center mt-4 pb-4">
                    <div class="col-4">
                        <div class="title">Learners</div>
                        <div class="data">{{ $course->number_learner }}</div>
                    </div>
                    <div class="col-4">
                        <div class="title">Lessons</div>
                        <div class="data">{{ $course->number_lesson }}</div>
                    </div>
                    <div class="col-4">
                        <div class="title">Quizzes</div>
                        <div class="data">{{ $course->quizze }}</div>
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
