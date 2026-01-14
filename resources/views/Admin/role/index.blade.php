@extends('Admin.master')
@section('AdminMenuOpen', 'menu-open')
@section('AdminActive', 'active')
@section('adminRoleActive', 'active')
@section('title') {{ $title ?? 'Role list' }} @endsection
@section('content')
    <div class="app-wrapper mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Admin Roles List</b></h3>
                                    <div class="start-end">
                                        @can('admin.view')
                                            <a href="{{ route('admin.index') }}" class="btn btn-primary">All Admins</a>
                                        @endcan

                                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">+ Create Role</a>

                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover" id="users-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 60px">SL</th>
                                                <th>Role Name</th>
                                                <th>Permissions</th>
                                                <th class="text-center" style="width: 160px">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($roles as $key => $role)
                                                <tr class="align-middle">
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>
                                                        <span class="fw-bold">{{ ucfirst($role->name) }}</span>
                                                    </td>

                                                    <td>
                                                        @forelse($role->permissions as $permission)
                                                            <span class="badge bg-primary mb-1">
                                                                {{ $permission->name }}
                                                            </span>
                                                        @empty
                                                            <span class="badge bg-secondary">No Permission</span>
                                                        @endforelse
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('admin.roles.delete', $role->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">
                                                        No roles found
                                                    </td>
                                                </tr>
                                            @endforelse
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
