@extends('admin.admin')
@section('title', 'add lesson')
@section('contents')
<h2 class="mt-5">Add lesson</h2>
<form action="{{ Route('admin.lesson.store', $id) }}" method="post">
    <div class="add-lesson">
        @csrf
        <table class="table w-100 mt-4">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Description</th>
                <td>
                    <textarea class="form-control" rows="4" name="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Requirement</th>
                <td>
                    <textarea class="form-control" rows="4" name="requirement">{{ old('requirement') }}</textarea>
                    @if($errors->has('requirement'))
                        <small class="text-danger">{{ $errors->first('requirement') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Content</th>
                <td>
                    <textarea class="form-control" rows="4" name="content">{{ old('content') }}</textarea>
                    @if($errors->has('content'))
                        <small class="text-danger">{{ $errors->first('content') }}</small>
                    @endif
                </td>
            </tr>
        </table>
        <span>
            <a href="" class="btn btn-info">Return</a>
            <button class="btn btn-success">Submit</button>
        </span>
    </div>
</form>
@endsection
