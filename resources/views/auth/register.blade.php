@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background: linear-gradient(to top left, #466dce, #000000); color: snow;"><h4>{{ __('Register') }}</h4></div>

                <div class="card-body" style="background-color: rgb(223, 223, 223); border: 1px solid black;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }} <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-bottom:1%; width: 100%; margin-left:auto; margin-right: auto;">
                            <label>User Type <span class="text-danger">*</span></label>
                            <div class="col-lg-6" style="margin-left: 19.5%;">
                                <select name="user_type" class="form-control" required>
                                    <option value="" selected disabled>Please choose a user type</option>
                                    <option value="supplier" {{ old('user_type') == "supplier" ? 'selected' : '' }}>Supplier</option>
                                    <option value="customer" {{ old('user_type') == "customer" ? 'selected' : '' }}>Customer</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" onkeydown="return /[0-9b\+\(\)]/i.test(event.key)" autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" autofocus>
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Register') }}
                                </button>
                                <div class="pt-2">Already have an account? <a href="{{ route('login') }}" style="color: #0e74d4;"><u>Log In</u></a></div>
                            </div>
                        </div>

                        {{-- <div style="margin-top: 5%;">
                            <label>or Login with Your Social Media Account:</label>
                            <a href="{{url('/redirect')}}" class="btn btn-facebook btn-user btn-block" style="background-color: #2A426F; color: snow; width: 65%; margin-right: auto; margin-left: auto;">
                                <i class="fab fa-facebook-f fa-fw"></i>&nbsp;&nbsp;Login with Facebook
                            </a>

                            <a href="javascript:void(0);" class="btn btn-google btn-user btn-block" style="background-color: #DC4A38; color: snow; width: 65%; margin-right: auto; margin-left: auto;">
                                <i class="fa-brands fa-google"></i>&nbsp;&nbsp;Login with Google Account
                            </a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
