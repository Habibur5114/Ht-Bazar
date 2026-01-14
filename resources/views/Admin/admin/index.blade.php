@extends('admin.master')
@section('AdminMenuOpen', 'menu-open')
@section('AdminActive', 'active')
@section('adminList', 'active')
@section('title') {{ $title ?? 'Admin list' }} @endsection


@section('content')
    <div class=" mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Admin List</b></h3>

                                    <a href="{{ route('admin.create') }}" class="btn btn-primary">+ Admin Create</a>

                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>image</th>
                                                <th>role</th>
                                                <th>Status</th>
                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $admin)
                                                <tr class="align-middle">
                                                    <td>{{ $admin->id }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>
                                                        @if ($admin->image)
                                                            <img src="{{ asset($admin->image) }}" width="60">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach($admin->roles as $role)
                                                            {{ $role->name }}
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        {{ $admin->status == 1 ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('admin.password', $admin->id) }}">Password</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('admin.edit', $admin->id) }}">Edit</a>
                                                                </li>
                                                            </ul>
                                                        </div>

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
