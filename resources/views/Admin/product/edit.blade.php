@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('categoryList', 'active')
@section('title') {{ $title ?? 'category create' }} @endsection
@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>Edit Category</b></h3>
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control "
                                                        placeholder="Enter name"
                                                        value="{{ old('name', $category->name ?? '') }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">image<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control"
                                                        placeholder="Enter image" value="{{ old('image') }}">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Description<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="description" id="" class="form-control" cols="30" rows="5">{{ old('description', $category->description ?? '') }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Status<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="status">
                                                        <option value="1"
                                                            {{ old('status', $category->status ?? '') == '1' ? 'selected' : '' }}>
                                                            Active
                                                        </option>

                                                        <option value="0"
                                                            {{ old('status', $category->status ?? '') == '0' ? 'selected' : '' }}>
                                                            Inactive
                                                        </option>
                                                    </select>


                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <!-- BUTTON -->
                                            <div class="col-12 pb-5">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
