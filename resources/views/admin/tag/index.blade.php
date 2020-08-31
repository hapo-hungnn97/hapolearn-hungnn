@extends('admin.admin')
@section('title','Admin - tag list')
@section('contents')
<h2 class="mt-5">Tag List</h2>
<a href="{{ Route('admin.tags.create') }}" class="btn btn-success my-3">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td><h4><span class="badge badge-secondary">{{ $tag->name }}</span></h4></td>
                <td class="form-inline">
                    <a href="{{ Route('admin.tags.edit', $tag->id) }}" class="btn btn-info mr-2">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <form action="{{ Route('admin.tags.destroy', $tag->id) }}" method="post">
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

    {{ $tags->links() }}
@endsection
