@extends('admin.admin')
@section('title','Admin - lesson list')
@section('contents')
<h2 class="mt-5">Lesson List - {{ $courseName }}</h2>
<a href="{{ Route('admin.lesson.create', $id) }}" class="btn btn-success my-3">
    <i class="fa fa-plus" aria-hidden="true"></i>
</a> 
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif         
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Requirement</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->id }}</td>
                <td>{{ $lesson->name }}</td>
                <td>{{ $lesson->description }}</td>
                <td>{{ $lesson->requirement }}</td>
                <td>{{ $lesson->content }}</td>
                <td class="form-inline">
                    <a href="{{ Route('admin.lesson.edit', [ $id, $lesson->id]) }}" class="btn btn-info mr-2">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <form action="{{ Route('admin.lesson.destroy', [ $id, $lesson->id]) }}" method="post">
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

    {{ $lessons->links() }}
@endsection
