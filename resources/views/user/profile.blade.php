@extends('layouts.app')
@section('title','profile')
@section('content')
    <div class="head-detail container-fluid mt-4 d-flex align-items-center">
        <span class="pl-5">Home > Profile</span>
    </div>
    <div class="container-fluid profile pb-5">
        <div class="row">
            <div class="col-3 profile-left d-flex justify-content-end">
                <div>
                    <img src="{{ asset('storage/'. $user->avatar) }}" class="img-fluid rounded-circle img-thumbnail avatar" alt="" width="250px">
                    <button class="btn btn-img" data-toggle="modal" data-target="#myAvatar"><i class="fas fa-camera"></i></button>
                    @if($errors->has('avatar'))
                        <div class="text-danger text-center">{{ $errors->first('avatar') }}</div>
                    @endif
                    <div id="myAvatar" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form class="modal-content" method="POST" enctype="multipart/form-data" action="{{ Route('avatar.update') }}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Image</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-file">
                                        <input type="file" name="avatar" id="avatar" hidden>
                                        <label for="avatar" class="d-flex justify-content-center">
                                            <i class="fas fa-cloud-upload-alt icon-upload"></i>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <img src="#" id="avatarUpload" class="rounded-circle img-fluid img-upload d-none">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="title-name text-center mt-3">{{ $user->name }}</div>
                    <div class="title-mail text-center pb-2">{{ $user->email }}</div>
                    <div class="title">
                        <i class="fas fa-birthday-cake text-danger"></i>
                        {{ $user->birthday }}
                    </div>
                    <div class="title">
                        <i class="fas fa-phone-alt text-success"></i>
                        {{ $user->phone_number }}
                    </div>
                    <div class="title">
                        <i class="fas fa-home text-primary"></i>
                        {{ $user->address }}
                    </div>
                    <div class="title-decs">
                        {{ $user->description }}
                    </div>
                </div>
            </div>
            <div class="col-9 profile-right pr-5">
                <div class="my-course">
                    <span>My course</span>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    @foreach($courses as $course)
                    <div class="">
                        <img src="{{ asset('storage/'. $course->image) }}" alt="" class="img-fluid img-cour rounded-circle mx-3">
                        <br>
                        <span>{{ $course->name }}</span>
                    </div>
                    @endforeach
                    <div>
                        <a href="{{ Route('course') }}" class="img-cour add-course d-flex align-items-center justify-content-center">+</a>
                    </div>
                </div>
                <div class="edit-profile">
                    <span>Edit profile</span>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success mt-3">{{ Session::get('message') }}</div>
                @endif  
                <div class="container-fluid">
                    <form action="{{ Route('profile.update') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label class="form-label">Name:</label>
                                    <input type="text" class="form-control" placeholder="Your name ..." name="name" value="{{ old('name', $user->name) }}">
                                    @if($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date of birthday:</label>
                                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday', $user->birthday) }}">
                                    @if($errors->has('birthday'))
                                    <small class="text-danger">{{ $errors->first('birthday') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control" placeholder="Your address..." name="address" value="{{ old('address', $user->address) }}">
                                    @if($errors->has('address'))
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" placeholder="Your email ..." name="email" value="{{ $user->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone:</label>
                                    <input type="text" class="form-control" placeholder="Your Phone..." name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                                    @if($errors->has('phone_number'))
                                    <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">About me:</label>
                                    <textarea class="form-control" placeholder="About me" rows="4" name="description">{{ old('description', $user->description) }}</textarea>
                                    @if($errors->has('description'))
                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 pb-4">
                            <button class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
