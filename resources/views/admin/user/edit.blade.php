@extends('admin.admin')
@section('title', 'edit user')
@section('contents')
<h2 class="mt-5">Edit Student</h2>
<form action="{{ Route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
    <div class="edit-user">
        @method('PUT')
        @csrf
        <table class="table w-50 mt-4">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    @if($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                    <input class="form-check-input ml-1" type="radio" name="gender" id="1" value="{{ App\User::GENDER['male'] }}" {{ old('gender', $user->gender) ==  App\User::GENDER['male'] ? 'checked' : '' }}>
                    <label for="1" class="ml-4">Male</label>
                    <input class="form-check-input ml-4" type="radio" name="gender" id="2" value="{{ App\User::GENDER['female'] }}" {{ old('gender', $user->gender) ==  App\User::GENDER['female'] ? 'checked' : '' }}>
                    <label for="2" class="ml-5">Female</label>
                    @if($errors->has('gender'))
                        <br>
                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
                    @if($errors->has('address'))
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Phone number</th>
                <td>
                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                    @if($errors->has('phone_number'))
                        <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <input class="form-check-input ml-1" type="radio" name="role" id="1" value="{{ App\User::ROLE['user'] }}" {{ old('role', $user->role) ==  App\User::ROLE['user'] ? 'checked' : '' }}>
                    <label for="1" class="ml-4">User</label>
                    <input class="form-check-input ml-4" type="radio" name="role" id="2" value="{{ App\User::ROLE['teacher'] }}" {{ old('role',  $user->role) ==  App\User::ROLE['teacher'] ? 'checked' : '' }}>
                    <label for="2" class="ml-5">Teacher</label>
                    @if($errors->has('role'))
                        <br>
                        <small class="text-danger">{{ $errors->first('role') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Avatar</th>
                <td>
                    <input type="file" class="form-control-file border" name="avatar">
                    @if($errors->has('avatar'))
                        <br>
                        <small class="text-danger">{{ $errors->first('avatar') }}</small>
                    @endif
                </td>
            </tr>
        </table>
        <div>
            <a href="{{ Route('admin.users.index') }}" class="btn btn-info">Return</a>
            <button class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection
