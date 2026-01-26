@extends('admin.master')
@section('BannerMenuOpen', 'menu-open')
@section('BannerActive', 'active')
@section('bannerAdsList', 'active')
@section('title') {{ $title ?? 'banner Ads list' }} @endsection
@section('content')
    <div class=" mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Banner Ads List</b></h3>

                                    <a href="{{ route('admin.banner-ads.create') }}" class="btn btn-primary">+ Banner Ads
                                        Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th>Name</th>
                                                <th>Offer</th>
                                                <th>Banner Category</th>
                                                <th>image</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $key => $banner)
                                                <tr class="align-middle">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $banner->name }}</td>
                                                    <td>{{ $banner->offer }}</td>
                                                    <td>{{ $banner->bannercategory->name }}</td>
                                                    <td>
                                                        @if ($banner->image)
                                                            <img src="{{ asset('uploads/banners/' . $banner->image) }}" width="120px">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $banner->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.banner-ads.edit', $banner->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('admin.banner-ads.delete', $banner->id) }}"
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
