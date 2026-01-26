@extends('admin.master')
@section('BannerMenuOpen', 'menu-open')
@section('BannerActive', 'active')
@section('bannerAdsList', 'active')
@section('title') {{ $title ?? 'banner Ads edit' }} @endsection
@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>Edit Banner Ads</b></h3>
                                    <a href="{{ route('admin.banner-ads.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.banner-ads.update', $banner->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter name" value="{{ old('name', $banner->name) }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Offer <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="offer" class="form-control"
                                                        placeholder="Enter offer" value="{{ old('offer', $banner->offer) }}">
                                                    @error('offer')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Link <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="link" class="form-control"
                                                        placeholder="Enter link" value="{{ old('link', $banner->link) }}">
                                                    @error('link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Banner Category<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="banner_category">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('banner_category', $banner->banner_category) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('banner_category')
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
                                                    <label class="form-label">Status<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="status">
                                                        <option value="1"
                                                            {{ $banner->status == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0"
                                                            {{ $banner->status == 0 ? 'selected' : '' }}>Inactive</option>

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
