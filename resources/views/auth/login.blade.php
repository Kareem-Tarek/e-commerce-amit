@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Login
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: black; color: snow;"><h4>{{ __('Login') }}</h4></div>

                <div class="card-body" style="background-color: rgb(223, 223, 223); border: 1px solid black;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            {{-- <a href="{{route('password.request')}}" style="padding-left: 61%">
                                Forgot Password?
                            </a> --}}

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}

                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4" style="display: flex; justify-content: space-between; ">
                                <div class="form-check" style="font-size: 80%;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div style=" font-size: 80%;">
                                    <a href="{{route('reset-password')}}" style=" color: #0e74d4;" >
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Login') }}
                                </button>

                                <div class="pt-2">Don't have an account? <a href="{{ route('register') }}" style="color: #0e74d4;"><u>Register</u></a></div>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>

                        <div style="margin-top: 5%;">
                            <label>or Login with Your Social Media Account:</label>
                            <a href="{{url('/redirect')}}" class="btn btn-facebook btn-user btn-block" style="background-color: #2A426F; color: snow; width: 65%; margin-right: auto; margin-left: auto;">
                                <i class="fab fa-facebook-f fa-fw"></i>&nbsp;&nbsp;Login with Facebook
                            </a>

                            <a href="javascript:void(0);" class="btn btn-google btn-user btn-block" style="background-color: #DC4A38; color: snow; width: 65%; margin-right: auto; margin-left: auto;">
                                <i class="fa-brands fa-google"></i>&nbsp;&nbsp;Login with Google Account
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
