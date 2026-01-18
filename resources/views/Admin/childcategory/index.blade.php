@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('childcategoryList', 'active')
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
                                    <h3 class="card-title mb-0"><b>Childcategory List</b></h3>

                                    <a href="{{ route('admin.childcategory.create') }}" class="btn btn-primary">+ Childcategory
                                        Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th style="width: 150px">subcategory Name</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($childCategories as $childCategory)
                                                <tr class="align-middle">
                                                    <td>{{ $childCategory->id }}</td>
                                                    <td>{{ $childCategory->subcategory->name }}</td>
                                                    <td>{{ $childCategory->name }}</td>
                                                    <td>
                                                        @if ($childCategory->image)
                                                            <img src="{{ asset($childCategory->image) }}" width="30">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>{{ $childCategory->description }}</td>

                                                    <td>
                                                        {{ $childCategory->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.childcategory.edit', $childCategory->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('admin.childcategory.delete', $childCategory->id) }}"
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

