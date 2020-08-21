@extends('layouts.app')
@section('title','List course')
@section('content')
    <div class="courses-list container">
        <div class="courses-search mt-md-5 d-flex flex-row">
            <a href="" class="btn btn-filter"><i class="fas fa-sliders-h"></i> Filter</a>
            <form action="">
                <input type="text" class="form-control width-search ml-md-3 ml-2" placeholder="Search...">
            </form>
            <i class="fas fa-search position-relative feedback"></i>
        </div>
        <div class="row">
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse9.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                HTML Fundamentals
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse10.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                CSS Fundamentals
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse11.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                PHP Tutorial
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse12.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                SQL Fundamentals
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse13.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                Swift 4 Fundamentals
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse14.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                C# Tutorial
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse15.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                Ruby Tutorial
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse18.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                C Tutorial
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse16.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                jQuery Tutorial
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse19.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                Angular + NestJS
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse17.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                Data Scienc Python
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse20.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                Machine Learning
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse9.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                HTML Fundamentals
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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
            <div class="courses-item col-md-6 col-12 mt-md-5 mt-4">
                <div class="block-content">
                    <div class="row mt-4">
                        <div class="col-3">
                            <img class="img-fluid d-flex mx-lg-auto ml-2" src="image/Ellipse10.png" alt="">
                        </div>
                        <div class="col-9 block-remove">
                            <div class="courses-title">
                                CSS Fundamentals
                            </div>
                            <div class="courses-desc mt-2">
                                Practice during lessons, practice between lessons, practice whenever you can. Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                            </div>
                            <div class="d-flex justify-content-end mt-4 mr-n4">
                                <a href="" class="btn btn-more">More</a>
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

            <div class="pagination mt-md-5 mt-4">
                <a href="" class="btn btn-pagi"><i class="fas fa-long-arrow-alt-left"></i></a>
                <a href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="" class="btn btn-pagi"><i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
@endsection
