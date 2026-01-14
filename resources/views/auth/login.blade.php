<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>

    {{-- AdminLTE header --}}
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
            <img src="{{ asset('logo/softvence.png') }}" alt="Logo"
                 style="height:130px;width:170px;">
        </div>

        <div class="d-flex justify-content-center fw-bold text-dark">
            <h5> Log in to your account </h5>
        </div>

        <div class="card-body login-card-body">

            {{-- Session Status (Breeze) --}}
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group mb-3">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input
                        id="email"
                        class="form-control mt-2 rounded-3"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                {{-- Password --}}
                <div class="form-group mb-3">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="input-group mt-2">
                        <x-text-input
                            id="password"
                            class="form-control rounded-start-3"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                        />

                        <span class="input-group-text rounded-end-3"
                              style="cursor:pointer"
                              onclick="togglePassword()">
                            <i id="eyeIcon" class="bi bi-eye"></i>
                        </span>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Remember Me --}}
                <div class="form-group mb-3">
                    <div class="form-check">
                        <input id="remember_me"
                               type="checkbox"
                               class="form-check-input"
                               name="remember">

                        <label class="form-check-label d-flex justify-content-between" for="remember_me">
                            {{ __('Remember me') }}
                            {{-- Forgot Password --}}
                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                                        {{ __('Forgot password?') }}
                                    </a>
                                </div>
                            @endif
                        </label>
                    </div>
                </div>

                {{-- Login Button --}}
                <div class="form-group d-flex justify-content-between">
                    <a href="{{ route('register') }}"
                            class="form-control mt-3 text-white bg-primary rounded-3 text-decoration-none text-center">
                        {{ __('Registration') }}
                    </a>
                    <button type="submit"
                            class="form-control mt-3 text-white bg-success rounded-3 ms-2">
                        {{ __('Log in') }}
                    </button>
                </div>
                <div class="d-flex align-items-center justify-content-center my-3 text-info">
                .................................. or continue with ..................................
                </div>
                <div class="form-group mt-3">
                    <a href="{{ route('facebook.login') }}" 
                    class="btn btn-light w-100 rounded-3 border d-flex align-items-center justify-content-center">
                    <i class="bi bi-facebook me-2 text-primary"></i>
                    Login with Facebook
                    </a>
                </div>

                <div class="form-group mt-3">
                    <a href="{{ route('google.login') }}"
                    class="btn btn-light w-100 rounded-3 border d-flex align-items-center justify-content-center">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                            alt="Google"
                            width="18"
                            class="me-2">
                        Login with Google
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>
