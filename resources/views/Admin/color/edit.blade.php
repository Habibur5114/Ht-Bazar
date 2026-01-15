@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('colorList', 'active')
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
                                    <h3 class="card-title"><b>Edit Subcategory</b></h3>
                                    <a href="{{ route('admin.subcategory.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.subcategory.update', $subcategory->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter name" value="{{ old('name', $subcategory->name) }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Category Name<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="category_id"  >
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
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
                                                    <textarea name="description" id="" class="form-control" cols="30" rows="5">{{ old('description', $subcategory->description) }}</textarea>
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
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <!-- BUTTON -->
                                            <div class="col-12 pb-5">
                                                <button type="submit" class="btn btn-success">Save</button>
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


