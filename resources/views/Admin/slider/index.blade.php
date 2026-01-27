@extends('admin.master')
@section('SliderMenuOpen', 'menu-open')
@section('SliderActive', 'active')
@section('sliderList', 'active')
@section('title') {{ $title ?? 'slider list' }} @endsection


@section('content')
    <div class=" mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Slider List</b></h3>

                                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">+ Slider
                                        Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th style="width: 280px">Title</th>
                                                <th>Subtitle</th>
                                                <th style="width: 180px">Image</th>
                                                <th>Button-Text</th>
                                                <th>Button-Link</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliders as $key => $slider)
                                                <tr class="align-middle">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td class="">{{ Str::limit($slider->subtitle, 200) }}</td>
                                                    <td>
                                                        <img src="{{ asset($slider->image) }}" alt="Slider Image"
                                                            class="w-50">
                                                    </td>
                                                    <td>{{ $slider->button_text }}</td>
                                                    <td>{{ $slider->button_link }}</td>
                                                    <td>
                                                        {{ $slider->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('admin.slider.delete', $slider->id) }}"
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

