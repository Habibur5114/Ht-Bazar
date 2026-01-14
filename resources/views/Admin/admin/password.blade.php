@extends('admin.master')
@section('AdminMenuOpen', 'menu-open')
@section('AdminActive', 'active')
@section('adminList', 'active')
@section('title') {{ $title ?? 'Admin password' }} @endsection
@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>Change Password</b></h3>
                                    <a href="{{ route('admin.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.passwordchange', $admins->id) }}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Current Password<span class="text-danger">*</span></label>
                                                    <div class="input-group mt-2">
                                                        <input type="password" name="current_password" id="adminPassword"
                                                            class="form-control rounded-start-3"
                                                            placeholder="Enter current password">
                                                        <span class="input-group-text rounded-end-3"
                                                            style="cursor: pointer;"
                                                            onclick="togglePassword('adminPassword', 'eyeIcon1')">
                                                            <i id="eyeIcon1" class="bi bi-eye"></i>
                                                        </span>
                                                    </div>
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group mb-3">
                                                    <label>New Password<span class="text-danger">*</span></label>
                                                    <div class="input-group mt-2">
                                                        <input type="password" name="new_password" id="adminPasswordnew"
                                                            class="form-control rounded-start-3"
                                                            placeholder="Enter new password">
                                                        <span class="input-group-text rounded-end-3"
                                                            style="cursor: pointer;"
                                                            onclick="togglePassword('adminPasswordnew', 'eyeIcon2')">
                                                            <i id="eyeIcon2" class="bi bi-eye"></i>
                                                        </span>
                                                    </div>
                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group mb-3">
                                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                                    <div class="input-group mt-2">
                                                        <input type="password" name="new_password_confirmation"
                                                            id="adminPasswordneww" class="form-control rounded-start-3"
                                                            placeholder="Enter new password">
                                                        <span class="input-group-text rounded-end-3"
                                                            style="cursor: pointer;"
                                                            onclick="togglePassword('adminPasswordneww', 'eyeIcon3')">
                                                            <i id="eyeIcon3" class="bi bi-eye"></i>
                                                        </span>
                                                    </div>
                                                    @error('new_password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

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
<script>
    function togglePassword(passwordId, iconId) {
        const password = document.getElementById(passwordId);
        const icon = document.getElementById(iconId);

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
