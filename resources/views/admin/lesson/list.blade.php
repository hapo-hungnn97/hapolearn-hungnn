@extends('admin.admin')
@section('title','Admin - course-list')
@section('contents')
<h2 class="mt-5">Course-List</h2>
<div class="card">  
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td><a href="{{ Route('admin.lesson.index', $course->id) }}">{{ $course->name }}</a></td>
                <td>
                    <img src="{{ ($course->image == null) ? '' : asset('storage/' . $course->image) }}" alt="" class="rounded-circle" width="35px">
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
</div>
    {{ $courses->links() }}
@endsection
