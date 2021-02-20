@extends('layouts.sb-admin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Post</h1>
    <p class="mb-4">This page list all Post</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror"
                        value="{{ $post->tittle }}" placeholder="Title">
                    @error('title')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror"
                        value="{{ $post->category_id }}">
                        @foreach ($categories as $category)
                            @if ($post->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
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
                            <label for="tag"><input type="checkbox" name="tags[]" value="{{ $tag->id }}" @foreach ($post->tags as $t) 
                                    @if ($t->id==$tag->id) checked @endif
                    @endforeach >
                    {{ $tag->tag }}
                    </label>
                </div>
                @endforeach
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control   @error('content') is-invalid @enderror"
                id="editor">{{ $post->content }}</textarea>
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
