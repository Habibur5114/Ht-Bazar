@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('productList', 'active')
@section('title') {{ $title ?? 'product list' }} @endsection


@section('content')
    <div class=" mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Product List</b></h3>

                                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">+ Product
                                        Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th >Name</th>
                                                <th>Category</th>
                                                <th>image</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Best & Feature</th>
                                                <th>status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr class="align-middle">
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->product_name }}</td>

                                                    <td>{{ $product->category->name }}</td>
                                                    <td>
                                                        @if (!empty($product->image))
                                                            <img src="{{ asset('uploads/products/' . $product->image[0]) }}"
                                                                alt="Product Image" style="width:50px;height:50px;"
                                                                class="rounded-circle">
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->new_price }}</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>
                                                        Best Selling: {{ $product->best_selling == 1 ? 'Yes' : 'No' }} <br>
                                                        Top Feature: {{ $product->feature_product == 1 ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="{{ route('admin.product.delete', $product->id) }}"
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
