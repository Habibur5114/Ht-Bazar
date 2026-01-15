@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('categoryList', 'active')
@section('title') {{ $title ?? 'category list' }} @endsection


@section('content')
    <div class=" mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Category List</b></h3>

                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">+ Category
                                        Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr class="align-middle">
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        @if ($category->image)
                                                            <img src="{{ asset($category->image) }}" width="30">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->description }}</td>

                                                    <td>
                                                        {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('admin.category.delete', $category->id) }}"
                                                            class="btn btn-sm btn-danger confirmDelete">
                                                            Delete
                                                        </a>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

