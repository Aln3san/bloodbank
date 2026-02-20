@extends('website.layouts.app')

@section('content')
    <!-- Start Header Page Section -->
    <section class="header-page container border my-5 p-3">
        <span class="main-font">{{ __('messages.home') }}</span>
        <span>/</span>
        <span class="main-font">{{ __('messages.login') }}</span>
    </section>
    <!-- End Header Page Section -->

    <!-- Start Sgin Form Section -->
    <section class="sgin-form container border mb-5">
        {{-- <form action={{ route('website.login.post') }} method="post">
            @csrf
            <input class="main-font form-control my-4 rounded-0" type="text" name="phone" id="phone"
                placeholder="{{ __('messages.phone') }}" />
            <input class="main-font form-control my-4 rounded-0" type="password" name="email" id="email"
                placeholder="{{ __('messages.password') }}" />
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" name="remember-me" id="remember-me" />
                    <label for="remember-me" class="main-font remember-me">{{ __('messages.remember_me') }}</label>
                </div>
                <a href="#" class="login-remember main-font"><i class="fa-solid fa-triangle-exclamation"
                        style="color: #f8a600;"></i>{{ __('messages.forgot_password') }}</a>
            </div>
            <div class="login-button mt-3">
                <button type="submit" class="main-font btn border rounded-0 d-block mx-3">
                    {{ __('messages.login') }}
                </button>
                <button type="submit" class="main-font btn border rounded-0 d-block mx-3">
                    {{ __('messages.register') }}
                </button>
            </div>
        </form> --}}
        <form action="{{ route('website.login.post') }}" method="post">
            @csrf

            <input class="main-font form-control my-4 rounded-0" type="text" name="phone" value="{{ old('phone') }}"
                placeholder="{{ __('messages.phone') }}" />

            <input class="main-font form-control my-4 rounded-0" type="password" name="password"
                placeholder="{{ __('messages.password') }}" />

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" name="remember-me" id="remember-me" />
                    <label for="remember-me" class="main-font remember-me">{{ __('messages.remember_me') }}</label>
                </div>
                <a href="#" class="login-remember main-font"><i class="fa-solid fa-triangle-exclamation"
                        style="color: #f8a600;"></i>{{ __('messages.forgot_password') }}</a>
            </div>
            
            <div class="login-button mt-3">
                <button type="submit" class="main-font btn border rounded-0 d-block mx-3">
                    {{ __('messages.login') }}
                </button>

                {{-- <a href="{{ route('website.register') }}" class="main-font btn border rounded-0 d-block mx-3">
                    {{ __('messages.register') }}
                </a> --}}
            </div>
        </form>

    </section>
    <!-- End Sgin Form Section -->
@endsection
