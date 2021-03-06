@extends('admin.admin')
@section('title', 'add course')
@section('contents')
<h2 class="mt-5">Add Course</h2>
<form action="{{ Route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
    <div class="add-course">
        @csrf
        <table class="table w-50 mt-4">
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
                <th>Times</th>
                <td>
                    <input type="text" class="form-control" name="times" value="{{ old('times') }}">
                    @if($errors->has('times'))
                        <small class="text-danger">{{ $errors->first('times') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Quizze</th>
                <td>
                    <input type="text" class="form-control" name="quizze" value="{{ old('quizze') }}">
                    @if($errors->has('quizze'))
                        <small class="text-danger">{{ $errors->first('quizze') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Price</th>
                <td>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                    @if($errors->has('price'))
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Tags</th>
                <td class="container">
                    <div class="row ml-2">
                        @foreach($tags as $tag)
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->id }}" name="tagId[]">
                            <label class="form-check-label" for="{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <input type="file" class="form-control-file border" name="image">
                    @if($errors->has('image'))
                        <br>
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    @endif
                </td>
            </tr>
        </table>
        <span>
            <a href="{{ Route('admin.courses.index') }}" class="btn btn-info">Return</a>
            <button class="btn btn-success">Submit</button>
        </span>
    </div>
</form>
@endsection
