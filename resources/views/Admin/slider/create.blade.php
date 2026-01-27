@extends('admin.master')
@section('SMenuOpen', 'menu-open')
@section('SliderActive', 'active')
@section('sliderList', 'active')
@section('title') {{ $title ?? 'slider create' }} @endsection
@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>Create Slider</b></h3>
                                    <a href="{{ route('admin.slider.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.slider.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Title<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Enter title" value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Sub-Title</label>
                                                    <textarea name="subtitle" class="form-control" id="" cols="30" rows="5">{{ old('subtitle') }}</textarea>
                                                    @error('subtitle')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Image<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Button-text</label>
                                                    <input type="text" name="button_text" class="form-control"
                                                        placeholder="Enter button text" value="{{ old('button_text') }}">
                                                    @error('button_text')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Button-Link</label>
                                                    <input type="text" name="button_link" class="form-control"
                                                        placeholder="Enter button link" value="{{ old('button_link') }}">
                                                    @error('button_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select form-control" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
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


