@extends('layouts.sb-admin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Post</h1>
    <p class="mb-4">This page list all Post</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" placeholder="Title">
                    @error('title')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror"
                        value="{{ old('category_id') }}">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tag</label>
                    @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label for="tag"><input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                {{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="editor" name="content" class="form-control  @error('content') is-invalid @enderror"
                        value="{{ old('content') }}"></textarea>
                    @error('content')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="featured">image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
