@extends('admin.admin')
@section('title', 'edit tag')
@section('contents')
<h2 class="mt-5">Edit Tag</h2>
<form action="{{ Route('admin.tags.update', $id) }}" method="post">
    <div class="edit-course">
        @method('PUT')
        @csrf
        <table class="table w-50 mt-4">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $tagName) }}">
                    @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </td>
            </tr>
        </table>
        <div>
            <a href="{{ Route('admin.tags.index') }}" class="btn btn-info">Return</a>
            <button class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection
