@extends('admin.master')
@section('CategoryMenuOpen', 'menu-open')
@section('CategoryActive', 'active')
@section('productList', 'active')
@section('title') {{ $title ?? 'product create' }} @endsection

@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>Create Product</b></h3>
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.product.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Product Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="product_name" class="form-control "
                                                        placeholder="Enter product name" value="{{ old('product_name') }}">
                                                    @error('product_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Category<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="category_id">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">SubCategories<span
                                                            class="">(Optional)</span></label>
                                                    <select class="form-select form-control" name="subcategory_id">
                                                        <option value="">Select SubCategories</option>
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                               <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ChildCategories<span
                                                            class="">(Optional)</span></label>
                                                    <select class="form-select form-control" name="ChildCategory_id">
                                                        <option value="">Select childCategories</option>
                                                        @foreach ($ChildCategorys as $ChildCategory)
                                                            <option value="{{ $ChildCategory->id }}">{{ $ChildCategory->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                               <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Brand</label>
                                                    <select class="form-select form-control" name="brand_id">
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Purchase Price <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="purchase_price" class="form-control "
                                                        placeholder="Enter purchase price" value="{{ old('purchase_price') }}">
                                                    @error('purchase_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Old Price <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="old_price" class="form-control "
                                                        placeholder="Enter old price" value="{{ old('old_price') }}">
                                                    @error('old_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">New Price <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="new_price" class="form-control "
                                                        placeholder="Enter new price" value="{{ old('new_price') }}">
                                                    @error('new_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">stock <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="stock" class="form-control "
                                                        placeholder="Enter stock" value="{{ old('stock') }}">
                                                    @error('stock')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">image <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control "
                                                        placeholder="Enter image" value="{{ old('image') }}">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">product unit(optional)</label>
                                                    <input type="text" name="product_unit" class="form-control "
                                                        placeholder="Enter product_unit" value="{{ old('product_unit') }}">
                                                    @error('product_unit')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">product video(optional)</label>
                                                    <input type="text" name="product_video" class="form-control "
                                                        placeholder="Enter product video url" value="{{ old('product_video') }}">
                                                    @error('product_video')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                             <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Brand</label>
                                                    <select class="form-select" id="basic-usage" data-placeholder="Choose one thing">
    <option></option>
    <option>Reactive</option>
    <option>Solution</option>
    <option>Conglomeration</option>
    <option>Algoritm</option>
    <option>Holistic</option>
</select>

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




