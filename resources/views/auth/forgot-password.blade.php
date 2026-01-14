<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forgot Password</title>

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

        <div class="card-body login-card-body">

            {{-- Description --}}
            <div class="mb-3 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
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
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Submit Button --}}
                <div class="form-group mt-3 d-flex justify-content-between">
                    <a href="{{ route('login') }}" class="text-decoration-none btn btn-primary">
                        {{ __('Back to Login') }}
                    </a>
                    <button type="submit"
                            class="btn text-white bg-success rounded-3">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
