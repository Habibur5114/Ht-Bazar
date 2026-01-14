@extends('admin.master')
@section('AdminMenuOpen', 'menu-open')
@section('AdminActive', 'active')
@section('adminList', 'active')
@section('title') {{ $title ?? 'admin Create' }} @endsection
@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>Create Admin</b></h3>
                                    <a href="{{ route('admin.index') }}" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control "
                                                        placeholder="Enter name" value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email<span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control "
                                                        placeholder="Enter email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Image <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control ">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-select-lg mb-3" name="status">
                                                        <option value="1"
                                                            {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                                            Active
                                                        </option>
                                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                            Inactive
                                                        </option>
                                                    </select>

                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Role <span class="text-danger">*</span>
                                                    </label>

                                                    <select name="role" class="form-select form-select-lg mb-3" required>

                                                        <option value="">Select Role</option>

                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                {{ old('role') == $role->id ? 'selected' : '' }}>
                                                                {{ ucfirst($role->name) }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    @error('role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Admin Password</label>

                                                    <div class="input-group mt-2">
                                                        <input type="password" name="password" id="adminPassword"
                                                            class="form-control rounded-start-3">

                                                        <span class="input-group-text rounded-end-3"
                                                            style="cursor: pointer;" onclick="togglePassword()">
                                                            <i id="eyeIcon" class="bi bi-eye"></i>
                                                        </span>

                                                    </div>
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

<script>
    function togglePassword() {
        const password = document.getElementById('adminPassword');
        const icon = document.getElementById('eyeIcon');

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
