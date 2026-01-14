<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>

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

        <div class="d-flex justify-content-center fw-bold text-info">
            <h5>Create an account to get started!</h5>
        </div>

        <div class="card-body login-card-body">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="form-group mb-3">
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input
                        id="name"
                        class="form-control mt-2 rounded-3"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

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
                        autocomplete="username"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="form-group mb-3">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input
                        id="password"
                        class="form-control mt-2 rounded-3"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div class="form-group mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input
                        id="password_confirmation"
                        class="form-control mt-2 rounded-3"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- Already registered + Register Button --}}
                <div class="d-flex justify-content-between pb-2">
                    <a href="{{ route('login') }}"
                       class="text-decoration-none text-gray-600 mt-3">
                        {{ __('Already have an account?') }}
                    </a>

                    <button type="submit"
                            class="btn mt-2 text-white bg-success rounded-3">
                        {{ __('Register') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
