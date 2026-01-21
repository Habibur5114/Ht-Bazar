@extends('admin.master')
@section('UserMenuOpen', 'menu-open')
@section('UserActive', 'active')
@section('UserList', 'active')
@section('title') {{ $title ?? 'User list' }} @endsection


@section('content')
    <div class=" mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>User List</b></h3>
                                </div>
                                <hr>
                                <div class="card-body ">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">sl</th>
                                                <th>Name</th>
                                                <th>email</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr class="align-middle">
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>

                                                    <td>{{ $user->email }}</td>

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
