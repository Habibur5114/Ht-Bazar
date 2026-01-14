@extends('Admin.master')
@section('AdminMenuOpen', 'menu-open')
@section('AdminActive', 'active')
@section('adminRoleActive', 'active')
@section('title') {{ $title ?? 'Edit Role' }} @endsection
@section('content')
    <div class="app-wrapper mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title mb-0"><b>Admin Role Edit</b></h3>
                                    <div class="start-end">
                                        <a href="{{ route('admin.roles.index', $role->id) }}"
                                            class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                        @csrf
                                        <!-- Role Name -->
                                        <div class="mb-3">
                                            <label class="fw-bold">Role Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $role->name }}" required>
                                        </div>

                                        <!-- All Permission -->
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="allPermission">
                                            <label class="fw-bold" for="allPermission">All Permission</label>
                                        </div>

                                        <hr>

                                        @foreach ($permissions as $module => $modulePermissions)
                                            @php
                                                $moduleId = 'module_' . md5($module);
                                            @endphp

                                            <div class="row mb-3 permission-group">
                                                {{-- Module checkbox --}}
                                                <div class="col-md-3">
                                                    <div class="form-check fw-bold text-capitalize">
                                                        <input type="checkbox" class="form-check-input module-checkbox"
                                                            id="{{ $moduleId }}">
                                                        <label class="form-check-label" for="{{ $moduleId }}">
                                                            {{ $module }}
                                                        </label>
                                                    </div>
                                                </div>

                                                {{-- Permissions --}}
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        @foreach ($modulePermissions as $permission)
                                                            @php
                                                                $id = 'perm_' . md5($permission->name);
                                                                $checked = in_array(
                                                                    $permission->name,
                                                                    $rolePermissions,
                                                                );
                                                            @endphp

                                                            <div class="col-md-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input permission"
                                                                        type="checkbox" id="{{ $id }}"
                                                                        name="permissions[]" value="{{ $permission->name }}"
                                                                        {{ $checked ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="{{ $id }}">
                                                                        {{ $permission->name }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                        @endforeach


                                        <button class="btn btn-success">Update Role</button>
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const allPermission = document.getElementById('allPermission');

            document.querySelectorAll('.permission-group').forEach(group => {
                const moduleCheckbox = group.querySelector('.module-checkbox');
                const permissions = group.querySelectorAll('.permission');

                // module checkbox auto check
                moduleCheckbox.checked = [...permissions].every(p => p.checked);

                moduleCheckbox.addEventListener('change', function() {
                    permissions.forEach(p => p.checked = this.checked);
                    updateAllPermission();
                });

                permissions.forEach(p => {
                    p.addEventListener('change', function() {
                        moduleCheckbox.checked = [...permissions].every(c => c.checked);
                        updateAllPermission();
                    });
                });
            });

            function updateAllPermission() {
                const permissions = document.querySelectorAll('.permission');
                allPermission.checked = [...permissions].every(p => p.checked);
            }

            // initial check
            updateAllPermission();

            allPermission.addEventListener('change', function() {
                document.querySelectorAll('.permission, .module-checkbox')
                    .forEach(cb => cb.checked = this.checked);
            });

        });
    </script>

@endsection
