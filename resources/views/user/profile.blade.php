@extends('layouts.app')
@section('title','profile')
@section('content')
    <div class="head-detail container-fluid mt-4 d-flex align-items-center">
        <span class="pl-5">Home > Profile</span>
    </div>
    <div class="container-fluid profile pb-5">
        <div class="row">
            <div class="col-4 profile-left d-flex justify-content-end">
                <div>
                    <img src="image/Ellipse1.png" class="img-fluid avatar" alt="" width="250px">
                    <div class="title-name text-center mt-3">Vũ Hoài Nam</div>
                    <div class="title-mail text-center pb-2">namvh@gmail.com</div>
                    <div class="title">
                        <i class="fas fa-birthday-cake text-danger"></i>
                        10/10/2998
                    </div>
                    <div class="title">
                        <i class="fas fa-phone-alt text-success"></i>
                        0395172042
                    </div>
                    <div class="title">
                        <i class="fas fa-home text-primary"></i>
                        Cầu Giấy, Hà Nội
                    </div>
                    <div class="title-decs">
                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ippsumipsum, them venenatis 
                    </div>
                </div>
            </div>
            <div class="col-8 profile-right">
                <div class="my-course">
                    <span>My course</span>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <img src="image/Ellipse9.png" alt="" class="img-fluid img-cour">
                    <img src="image/Ellipse9.png" alt="" class="img-fluid img-cour">
                    <img src="image/Ellipse9.png" alt="" class="img-fluid img-cour">
                    <img src="image/Ellipse9.png" alt="" class="img-fluid img-cour">
                    <img src="image/Ellipse9.png" alt="" class="img-fluid img-cour">
                    <span class="img-cour add-course d-flex align-items-center justify-content-center">+</span>
                </div>
                <div class="edit-profile">
                    <span>Edit profile</span>
                </div>
                <div class="container-fluid">
                    <form action="">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label class="form-label">Name:</label>
                                    <input type="text" class="form-control" placeholder="Your name ...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date of birthday:</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control" placeholder="Your address...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" placeholder="Your email ...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone:</label>
                                    <input type="text" class="form-control" placeholder="Your Phone...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">About me:</label>
                                    <textarea class="form-control" placeholder="About me" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
