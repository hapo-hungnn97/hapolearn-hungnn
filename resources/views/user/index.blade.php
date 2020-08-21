@extends('layouts.app')
@section('title','Hapolearn')
@section('content')
    <div class="banner container-fluid">
        <div class="block-banner">
            <div class="txt-banner">Learn Anytime, Anywhere</div>
            <div class="txt-title">
                at HapoLearn <img class="img-title" src="image/Group6.png" alt=""> !
            </div>
            <div class="txt-desc">
                Interactive lessons, "on-the-go"
                <br>
                practice, peer support.
            </div>
            <a href=""><div class="btn btn-start">Start Learning Now !</div></a>
        </div>
        <div class="block-messenger">
            <div class="toggle-class container-fluid">
                <div class="block-chat row">
                    <img class="img-hapo col-lg-2 col-md-2 col-2 ml-n2" src="image/Ellipse7.png" alt="">
                    <div class="block-content col-lg-9 col-md-9 col-9 mt-3 ml-n3">
                        <span class="web-name">HapoLearn</span>
                        <div class="block-alert d-flex align-items-center mt-2">
                            <span class="text-alert">
                                HapoLearn xin chào bạn.
                                <br>
                                Bạn có cần chúng tôi hỗ trợ gì không?
                            </span>
                        </div>
                        <div class="login-mess d-flex align-items-center justify-content-center mt-2 mb-2 ml-n1">
                            <img class="img-mess" src="image/Vector.png" alt="">
                            <span class="txt-login">Đăng nhập vào Messenger</span>
                        </div>
                        <span class="txt-chat ml-4">Chat với HapoLearn trong Messenger</span>
                    </div>
                    <div class="col-lg-1 col-md-1 col-1 ml-4 mt-2">
                        <span class="fa fa-times close d-flex align-items-center justify-content-center"></span>
                    </div>
                </div>
            </div>
            <div class="messenger d-flex align-items-center justify-content-center">
                <img src="image/Vector(5).png" alt="">
            </div>
        </div>   
    </div>
    <div class="color-strip"></div>
    <div class="block-courses container">
        <div class="row">
            @foreach($courses as $course)
            <div class="content-courses col-lg-4 col-md-4 col-9">
                <div class="head background-left d-flex align-items-center justify-content-center">
                    <img class="img-courses img-fluid" src="{{ $course->image }}" alt="">
                </div>
                <div class="foot text-center">
                    <div class="txt-content text-center pt-4">{{ $course->name }}</div>
                    <div class="txt-des text-center mt-2">{{ $course->description }}</div>
                    <a href="" class="btn">Take This Course</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="other-courses container">
        <div class="title-courses mt-5 pt-lg-5 text-center">
            <span>Other courses</span>
            <hr/>
        </div>
        <div class="row pt-lg-3">
            @foreach($otherCourses as $otherCourse)
            <div class="content-courses col-lg-4 col-md-4 col-9">
                <div class="head background-left-other d-flex align-items-center justify-content-center">
                    <img class="img-courses img-fluid img-fix" src="{{ $otherCourse->image }}" alt="">
                </div>
                <div class="foot text-center">
                    <div class="txt-content text-center pt-4">{{ $otherCourse->name }}</div>
                    <div class="txt-des text-center mt-2">{{ $otherCourse->description }}</div>
                    <a href="" class="btn">Take This Course</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="all-courses text-center pb-lg-5">
            <a href="">View All Our Courses</a>
            <span><img class="img-fluid" src="image/icon.png" alt=""></span>
        </div>
    </div>
    <div class="reason container-fluid">
        <div class="row">
            <div class="head-reason block-reason col-md-4 col-5">
                <img class="img-lap img-fluid" src="image/mb1.png" alt="">
            </div>
            <div class="title-reason d-lg-none col-md-8 col-7 pt-md-5">
                Why HapoLearn?
            </div>
        </div>
        <div class="row mt-md-n5 mt-n4 pb-lg-5 pb-md-3">
            <div class="left-reason col-lg-6 col-md-7 col-12">
                <div class="title-reason col-lg-12 d-lg-block d-none">
                    <span class="d-flex justify-content-lg-end mr-lg-5">Why HapoLearn?</span>
                </div>
                <div class="text-reason col-lg-12 col-12 d-flex justify-content-lg-end">
                    <ul class="pl-lg-5">
                        <li class="my-3"><img class="img-fluid" src="image/v.png" alt=""><span class="pl-2">Interactive lessons, "on-the-go" practice, peer support.</span></li>
                        <li class="my-3"><img class="img-fluid" src="image/v.png" alt=""><span class="pl-2">Interactive lessons, "on-the-go" practice, peer support.</span></li>
                        <li class="my-3"><img class="img-fluid" src="image/v.png" alt=""><span class="pl-2">Interactive lessons, "on-the-go" practice, peer support.</span></li>
                        <li class="my-3"><img class="img-fluid" src="image/v.png" alt=""><span class="pl-2">Interactive lessons, "on-the-go" practice, peer support.</span></li>
                        <li class="my-3"><img class="img-fluid" src="image/v.png" alt=""><span class="pl-2">Interactive lessons, "on-the-go" practice, peer support.</span></li>
                    </ul>
                </div>
            </div>
            <div class="right-reason col-lg-6 col-md-5 col-12">
                <img class="img-trans img-fluid" src="image/transparent.png" alt="">
            </div>
        </div>
    </div>
    <div class="feedback container pb-lg-4">
        <div class="title-feedback mt-5 pt-lg-5 text-center">
            <span class="txt-title">Feedback</span>
            <hr/>
            <span class="txt-decs">
                What other students turned professionals have to say about us 
                <br class="d-md-block d-none"> 
                after learning with us and reaching their goals
            </span>
        </div>
        <div class="slide-block row mt-5">
            <div class="block-cmt d-flex flex-column col-lg-6 col-12">
                <div class="element-cmt d-flex flex-row mx-auto">
                    <div class="pt-4">
                        <img class="hr ml-4" src="image/Rectangle21.png" alt="">
                    </div>
                    <div class="cmt ml-2">
                        <p> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course.
                        <br>
                            Thank you Eddie Bryan.”
                        </p>
                    </div>
                </div>
                <div class="element-account d-flex flex-row">
                    <img class="img-fluid img-account ml-lg-3" src="image/Ellipse1.png" alt="">
                    <div class="block-infor ml-2 d-flex flex-column">
                        <span class="txt-name">Hoang Anh Nguyen</span>
                        <span class="txt-lang">PHP</span>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="block-cmt d-flex flex-column col-lg-6 col-12">
                <div class="element-cmt d-flex flex-row mx-auto">
                    <div class="pt-4">
                        <img class="hr ml-4" src="image/Rectangle21.png" alt="">
                    </div>
                    <div class="cmt ml-2">
                        <p> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course.
                        <br>
                        Thank you Eddie Bryan.”
                        </p>
                    </div>
                </div>
                <div class="element-account d-flex flex-row">
                    <img class="img-fluid img-account ml-lg-3" src="image/Ellipse1.png" alt="">
                    <div class="block-infor ml-2 d-flex flex-column">
                        <span class="txt-name">Tuan Tran Hoang</span>
                        <span class="txt-lang">Python</span>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="block-cmt d-flex flex-column col-lg-6 col-12">
                <div class="element-cmt d-flex flex-row mx-auto">
                    <div class="pt-4">
                        <img class="hr ml-4" src="image/Rectangle21.png" alt="">
                    </div>
                    <div class="cmt ml-2">
                        <p> “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course.
                        <br>
                        Thank you Eddie Bryan.”
                        </p>
                    </div>
                </div>
                <div class="element-account d-flex flex-row">
                    <img class="img-fluid img-account ml-lg-3" src="image/Ellipse1.png" alt="">
                    <div class="block-infor ml-2 d-flex flex-column">
                        <span class="txt-name">Tuan Tran Hoang</span>
                        <span class="txt-lang">Python</span>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="controls-top row d-flex justify-content-between position-relative">
          <a class="btn-sm prev"><i class="fas fa-chevron-left"></i></a>
          <a class="btn-sm next"><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
    <div class="learn container-fluid mt-5 text-center d-flex flex-column justify-content-center align-items-center">
        <span class="txt-learn">
            Become a member of our <br> growing community! 
        </span>
        <a class="btn btn-start-learn mt-3" href="">
            Start Learning Now!
        </a>
    </div>
    <div class="statistic container pb-lg-4">
        <div class="title-statistic mt-5 pt-lg-5 text-center">
            <span>Statistic</span>
            <hr/>
        </div>
        <div class="content-statistic row text-center pb-xl-5 pb-md-4 pb-2 mt-lg-5">
            <div class="col-lg-4 col-md-4">
                <div class="title mt-3">Courses</div>
                <div class="data mt-3">1,568</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="title mt-3">Lessons</div>
                <div class="data mt-3">2,689</div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="title mt-3">learners</div>
                <div class="data mt-3">16,882</div>
            </div>
        </div>
    </div>
@endsection
