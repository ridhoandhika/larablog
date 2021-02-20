@extends('layouts.sb-admin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>
    <p class="mb-4">This page list all category</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $data->id) }}" class="badge badge-warning"><i
                                            class="far fa-edit"></i> Edit</a>
                                    <a href="{{ route('category.delete', $data->id) }}" class="badge badge-danger"><i
                                            class="far fa-trash"></i> Delete</a>
                                    <!--<a href="#" data-id="{//{ $data->id }}" class="badge badge-danger swal-confirm">
                                            <form action="{//{ route('category.delete', $data->id) }}"
                                                id="delete{//{ $data->id }}" method="POST">
                                                @//csrf
                                                @//method('delete')
                                            </form>
                                            Delete
                                        </a>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
