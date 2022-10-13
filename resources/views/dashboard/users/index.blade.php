@extends('layouts.admin.master')

@section('title') {{__('admin/user.users')}} @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{__('admin/user.users')}}</h3>
        @endslot
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">{{__('admin/user.users')}}</li>
    @endcomponent

    <div class="container-fluid user-card">
        <div class="row">
            @forelse($users as $user)
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                <div class="card custom-card">

                    <div class="card-profile"><img class="rounded-circle" src="{{$user->photo}}" alt="" /></div>
                    <ul class="card-social">
                        <li>
                            <a href="https://facebook.com/{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        {{-- <li>
                            <a href="https://twitter.com/{{$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li> --}}
                        <li>
                            <a href="https://instagram.com/{{$user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://whatsapp.com/{{$user->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        {{-- <li>
                            <a href="https://t.me/{{$user->telegram}}" target="_blank"><i class="fa fa-telegram"></i></a>
                        </li> --}}
                    </ul>
                    <div class="text-center profile-details">
                        <a href="#"> <h4>{{$user->name}}</h4></a>
                        <h6>{{$user->email}}</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">7564</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">49</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">96</span>M</h3>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>


@endsection
