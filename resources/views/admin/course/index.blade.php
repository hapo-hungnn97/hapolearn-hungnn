@extends('admin.admin')
@section('title','Admin - course list')
@section('contents')
<h2 class="mt-5">Course List</h2>
<a href="{{ Route('admin.courses.create') }}" class="btn btn-success my-3">
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>
<form action="{{ Route('admin.course.search') }}" method="GET">
    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
</form>
<br>
@if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<div class="card">      
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>
                <img src="{{ ($course->image == null) ? '' : asset('storage/' . $course->image) }}" alt="" class="rounded-circle" width="35px">
                </td>
                <td class="form-inline">
                    <a href="{{ Route('admin.courses.edit', $course->id) }}" class="btn btn-info mr-2">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <form action="{{ Route('admin.courses.destroy', $course->id) }}" method="post">
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
</div>
    {{ $courses->links() }}
@endsection
