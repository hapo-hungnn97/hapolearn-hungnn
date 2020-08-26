@extends('admin.admin')
@section('title','Admin - user list')
@section('contents')
<h2 class="mt-5">User List</h2>
<a href="{{ Route('admin.users.create') }}" class="btn btn-success my-3">
    <i class="fa fa-user-plus" aria-hidden="true"></i>
</a> 
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif         
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <img src="{{ ($user->avatar == null) ? '' : asset('storage/' . $user->avatar) }}" alt="" class="rounded-circle" width="35px">
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender_label }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->role_label }}</td>
                <td class="form-inline">
                    <a href="{{ Route('admin.users.edit', $user->id) }}" class="btn btn-info mr-2">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <form action="{{ Route('admin.users.destroy', $user->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form> 
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
