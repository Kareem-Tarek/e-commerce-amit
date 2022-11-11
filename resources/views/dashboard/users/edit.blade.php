@extends('layouts.admin.master')

@section('title') Edit ({{$model->name}}) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Edit ({{$model->name}})</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a> </li>
        <li class="breadcrumb-item active">Edit ({{$model->name}})</li>
        @slot('bookmark')
            <a href="{{route('users.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New User">Add New User</a>
        @endslot
    @endcomponent
    @include('layouts.admin.partials.validation-errors')

    @if(session()->has('confirm_password_empty'))
        <div class="alert alert-danger text-left session-message">
            {{-- <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> --}}
            <h3>Warning!</h3><br><span style="font-size: 150%;">•</span>&nbsp;&nbsp;{{ session()->get('confirm_password_empty') }}
        </div>
    @elseif(session()->has('confirm_password_not_matching'))
        <div class="alert alert-danger text-left session-message">
            {{-- <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> --}}
            <h3>Warning!</h3><br><span style="font-size: 150%;">•</span>&nbsp;&nbsp;{{ session()->get('confirm_password_not_matching') }}
        </div>
    @endif

    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Check Changes</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    {{-- <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'ar') active  @endif" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">Arabic<div class="media"></div></a></li>
                    <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'en') active  @endif" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">English</a></li>
                    <li class="nav-item"><a class="nav-link @if(LaravelLocalization::getCurrentLocale() == 'fr') active  @endif" id="fr-tab" data-bs-toggle="pill" href="#fr" role="tab" aria-controls="fr" aria-selected="@if(LaravelLocalization::getCurrentLocale() == 'ar') true @else false @endif">French</a></li> --}}
                </ul>
                <div class="tab-content " id="pills-tabContent">
                    <form action="{{route('users.update',$model->id)}}" method="post" id="alert-form">
                        @csrf
                        {{ method_field('put') }}
                            <div class="tab-pane mt-4" role="tabpanel">

                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Username <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('username') is-invalid @enderror" value="{{Request::old('username') ? Request::old('username') : $model->username}}" type="text" name="username" placeholder="Enter username" autocomplete="off">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Name <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $model->name}}" type="text" name="name" placeholder="Enter name" autocomplete="off">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $model->email}}" type="text" name="email" placeholder="Enter user email" autocomplete="off">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('password') is-invalid @enderror" value="{{Request::old('password') ? Request::old('password') : $model->password}}" type="password" name="password" placeholder="Enter user password" autocomplete="off">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('password') is-invalid @enderror" value="" type="password" name="confirm_password" placeholder="Enter user confirm password" autocomplete="off">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="form-label col-lg-3">User Type <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="user_type" class="form-control select @error('user_type') is-invalid @enderror" value="{{Request::old('user_type') ? Request::old('user_type') : $model->user_type}}">
                                            <option value="" disabled selected> ---------- Please select a user type ---------- </option>
                                            <option value="customer" {{ isset($model) && $model->user_type == "customer" ? 'selected'  : '' }}>Customer</option>
                                            <option value="supplier" {{ isset($model) && $model->user_type == "supplier" ? 'selected'  : '' }}>Supplier</option>
                                            <option value="admin" {{ isset($model) && $model->user_type == "admin" ? 'selected'  : '' }}>Admin</option>
                                            <option value="moderator" {{ isset($model) && $model->user_type == "moderator" ? 'selected'  : '' }}>Moderator</option>
                                        </select>
                                        @error('user_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Phone <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('phone') is-invalid @enderror" value="{{Request::old('phone') ? Request::old('phone') : $model->phone}}" type="text" name="phone" placeholder="Enter user phone" autocomplete="off">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="form-label col-lg-3">Gender <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <select name="gender" class="form-control select @error('gender') is-invalid @enderror" value="{{Request::old('gender') ? Request::old('gender') : $model->gender}}">
                                            <option value="" disabled selected> ---------- Please select a gender ---------- </option>
                                            <option value="male" {{ isset($model) && $model->gender == "male" ? 'selected'  : '' }}>Male</option>
                                            <option value="female" {{ isset($model) && $model->gender == "female" ? 'selected'  : '' }}>Female</option>
                                            <option value="unspecified" {{ isset($model) && $model->gender == "unspecified" ? 'selected'  : '' }}>Unspecified</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            
                            </div>                        
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
