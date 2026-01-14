@extends('Admin.master')

@section('AdminMenuOpen', 'menu-open')
@section('AdminActive', 'active')
@section('adminRoleActive', 'active')

@section('title', $title ?? 'Create Role')

@section('content')
<div class="app-wrapper mt-5">
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-2">
                        <div class="card mb-4">
                            <div class="d-flex justify-content-between align-items-center m-3">
                                <h3 class="card-title mb-0"><b>Admin Role Create</b></h3>
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Back</a>
                            </div>
                            <hr>

                            <div class="card-body">
                                <form action="{{ route('admin.roles.store') }}" method="POST">
                                    @csrf

                                    {{-- Role Name --}}
                                    <div class="mb-3">
                                        <label class="fw-bold">Role Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                    {{-- All Permission --}}
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="allPermission">
                                        <label class="fw-bold form-check-label" for="allPermission">
                                            All Permission
                                        </label>
                                    </div>

                                    <hr>

                                    {{-- Permission Groups --}}
                                    @foreach ($permissions as $groupName => $groupPermissions)
                                        @php
                                            $groupId = 'group_' . md5($groupName);
                                        @endphp

                                        <div class="row mb-3 permission-group">
                                            {{-- Group --}}
                                            <div class="col-md-3">
                                                <div class="form-check fw-bold text-capitalize">
                                                    <input type="checkbox"
                                                           class="form-check-input module-checkbox"
                                                           id="{{ $groupId }}">
                                                    <label class="form-check-label" for="{{ $groupId }}">
                                                        {{ $groupName }}
                                                    </label>
                                                </div>
                                            </div>

                                            {{-- Permissions --}}
                                            <div class="col-md-9">
                                                <div class="row">
                                                    @foreach ($groupPermissions as $permission)
                                                        @php
                                                            $permId = 'perm_' . md5($permission->name);
                                                        @endphp
                                                        <div class="col-md-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input permission"
                                                                       type="checkbox"
                                                                       id="{{ $permId }}"
                                                                       name="permissions[]"
                                                                       value="{{ $permission->name }}">
                                                                <label class="form-check-label" for="{{ $permId }}">
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

                                    <button class="btn btn-primary">Save Role</button>
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

<script>
document.addEventListener('DOMContentLoaded', () => {

    const allPermission = document.getElementById('allPermission');
    const allCheckboxes = document.querySelectorAll('.permission, .module-checkbox');

    // ALL permission
    allPermission.addEventListener('change', function () {
        allCheckboxes.forEach(cb => cb.checked = this.checked);
    });

    // Group logic
    document.querySelectorAll('.permission-group').forEach(group => {
        const groupCheckbox = group.querySelector('.module-checkbox');
        const permissions = group.querySelectorAll('.permission');

        // Group → permissions
        groupCheckbox.addEventListener('change', function () {
            permissions.forEach(p => p.checked = this.checked);
            updateAllPermission();
        });

        // Permission → group
        permissions.forEach(p => {
            p.addEventListener('change', function () {
                groupCheckbox.checked = [...permissions].every(x => x.checked);
                updateAllPermission();
            });
        });
    });

    // Update ALL
    function updateAllPermission() {
        const permissions = document.querySelectorAll('.permission');
        allPermission.checked = [...permissions].every(p => p.checked);
    }
});
</script>

