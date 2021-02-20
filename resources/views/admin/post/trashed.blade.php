@extends('layouts.sb-admin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Post</h1>
    <p class="mb-4">This page list post</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Gambar</td>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ asset($post->featured) }}" alt="$post->tittle" width="90px"
                                        height="50px">
                                </td>
                                <td>{{ $post->tittle }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <a href="{{ route('post.restore', $post->id) }}" class="badge badge-warning"><i
                                            class="far fa-edit"></i> Restore</a>
                                    <a href="{{ route('post.delete', $post->id) }}" class="badge badge-danger"><i
                                            class="far fa-trash"></i> Clean</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
