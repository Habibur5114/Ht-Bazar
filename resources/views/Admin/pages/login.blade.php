<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')Admin Login - {{ config('app.name', 'Venmeo.de') }}</title>
    @include('Admin.includes.header')
    <style>
        .login-box {
            width: 450px;
        }
    </style>
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline shadow rounded-4 overflow-hidden">
            <div class="d-flex justify-content-center align-items-center mt-3">
                @php
                    $setting = \App\Models\Setting::first();
                    $logo = $setting?->site_logo;
                @endphp

                @if ($logo)
                    <img src="{{ asset($logo) }}" alt="AdminLTE Logo" class="w-50 py-4">
                @else
                    <img src="{{ asset('images/default-logo.png') }}" class="w-50 py-4" alt="AdminLTE Logo">
                @endif

            </div>

            <div class="card-body login-card-body">
                <form action="{{ route('admin.loginstore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Admin Email</label>
                        <input type="email" name="email" value="{{ old ('email') }}" class="form-control  mt-2 rounded-3">
                    </div>

                    @if ($errors->any())
                        <div class="text-danger mb-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Admin Password</label>

                        <div class="input-group mt-2">
                            <input type="password" name="password" id="adminPassword"
                                class="form-control rounded-start-3">

                            <span class="input-group-text rounded-end-3" style="cursor: pointer;"
                                onclick="togglePassword()">
                                <i id="eyeIcon" class="bi bi-eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control mt-4 mb-5 text-white bg-success rounded-3"
                            value="Sign in">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

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


</html>
