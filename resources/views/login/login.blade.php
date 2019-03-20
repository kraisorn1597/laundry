@extends('layouts.app')
<div class="lowin">
    <div class="lowin-brand">
        <img src="{{ asset('img/login.png') }}" alt="logo">
    </div>
    <div class="lowin-wrapper">
        <div class="lowin-box lowin-login">
            <div class="lowin-box-inner">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <p>Sign in to continue</p>
                    <div class="lowin-group">
                        <label>Username<a href="#" class="login-back-link">Sign in?</a></label>
                        <input id="username" type="text" autocomplete="username" name="username" class="lowin-input" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="lowin-group password-group">
                        {{--<label>Password <a href="#" class="forgot-link">Forgot Password?</a></label>--}}
                        <label>Password<a class="login-back-link"></a></label>
                        <input type="password" name="password" autocomplete="current-password" class="lowin-input">
                    </div>
                    <button class="lowin-btn login-btn">
                        Sign In
                    </button>

                    <div class="text-foot">
                        Don't have an account? <a href="{{ route('register') }}" class="register-link">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
