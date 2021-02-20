@extends('layouts.sb-admin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>
    <p class="mb-4">This page list all category</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('tag.update', $tag->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
