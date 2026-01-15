@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('subcategoryList', 'active')
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
                                    <h3 class="card-title mb-0"><b>Subcategory List</b></h3>

                                    <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary">+ Subcategory
                                        Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th style="width: 150px">Category Name</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subcategories as $subcategory)
                                                <tr class="align-middle">
                                                    <td>{{ $subcategory->id }}</td>
                                                    <td>{{ $subcategory->category->name }}</td>
                                                    <td>{{ $subcategory->name }}</td>
                                                    <td>
                                                        @if ($subcategory->image)
                                                            <img src="{{ asset($subcategory->image) }}" width="30">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>{{ $subcategory->description }}</td>

                                                    <td>
                                                        {{ $subcategory->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('admin.subcategory.delete', $subcategory->id) }}"
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

