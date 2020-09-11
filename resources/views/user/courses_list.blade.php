@extends('layouts.app')
@section('title','All courses')
@section('content')
<div class="courses-list container">
    <div class="courses-search mt-md-5 d-flex flex-row">
        <a class="btn btn-filter"><i class="fas fa-sliders-h"></i> Filter</a>
        <form action="{{ Route('course.search') }}" method="POST">
            @csrf
            <input type="text" class="form-control width-search ml-md-3 ml-2" placeholder="Search..." name="search">
        </form>
        <i class="fas fa-search position-relative feedback"></i>
        <button class="btn-search-course">Tìm kiếm</button>
    </div>
    <div class="row mt-3 fil">
        <span class="txt-filter mt-3 ml-3">Lọc theo</span>
        <span class="filter-detail mt-3">
            <button class="active-filter">Mới nhất</button>
        </span>
        <span class="filter-detail mt-3">
            <button class="active-filter">Cũ nhất</button>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" id="sel1">
                <option disabled selected hidden>Teacher</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" id="sel1">
                <option disabled selected hidden>Số người học</option>
                <option>Tăng dần</option>
                <option>Giảm dần</option>
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control  select-fil" id="sel1">
                <option disabled selected hidden>Thời gian học</option>
                <option>Tăng dần</option>
                <option>Giảm dần</option>
            </select>
        </span>
        <span class="form-group filter-detail mt-3">
            <select class="form-control select-fil" id="sel1">
                <option disabled selected hidden>Số bài học</option>
                <option>Tăng dần</option>
                <option>Giảm dần</option>
            </select>
        </span>
        <br>
        <span class="form-group filter-tag mt-2">
            <select class="form-control select-fil" id="sel1">
                <option disabled selected hidden>Tags</option>
                <option>Tăng dần</option>
                <option>Giảm dần</option>
            </select>
        </span>
        <span class="form-group filter-detail mt-2">
            <select class="form-control select-fil" id="sel1">
                <option disabled selected hidden>Review</option>
                <option>Tăng dần</option>
                <option>Giảm dần</option>
            </select>
        </span>
    </div>
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
