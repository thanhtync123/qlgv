@extends('layouts.auth_app')
@section('content')
<div class="auth-form-transparent text-left p-3">
    <div class="brand-logo">

    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <h4>Chào mừng trở lại!</h4>
    <h6 class="font-weight-light">Rất vui được gặp lại bạn!</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                </div>
                <input type="email" name="email" class="form-control form-control-lg border-left-0" id="email" required autofocus placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Mật khẩu</label>
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                </div>
                <input type="password" class="form-control form-control-lg border-left-0"
                       name="password"
                       required autocomplete="current-password"
                       id="password" placeholder="Mật khẩu">
            </div>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    {{ __('Ghi nhớ tôi') }}
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="auth-link text-black" href="{{ route('password.request') }}">
                    {{ __('Quên mật khẩu?') }}
                </a>
            @endif
        </div>
        <div class="my-3">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">{{ __('Đăng nhập') }}</button>
        </div>
        {{--<div class="mb-2 d-flex">
            <button type="button" class="btn btn-facebook auth-form-btn flex-grow me-1">
                <i class="ti-facebook me-2"></i>Facebook
            </button>
            <button type="button" class="btn btn-google auth-form-btn flex-grow ms-1">
                <i class="ti-google me-2"></i>Google
            </button>
        </div>--}}
{{--        <div class="text-center mt-4 font-weight-light">
            Don't have an account? <a href="{{route('/register')}}" class="text-primary">Create</a>
        </div>--}}
    </form>
</div>
@endsection