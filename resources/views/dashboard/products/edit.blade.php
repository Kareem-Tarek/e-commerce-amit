@extends('layouts.admin.master')

@section('title') Edit ({{$model->name}}) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Edit ({{$model->name}})</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a> </li>
        <li class="breadcrumb-item active">Edit ({{$model->name}})</li>
        @slot('bookmark')
            <a href="{{route('products.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Product</a>
        @endslot
    @endcomponent
    @include('layouts.admin.partials.validation-errors')
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
                    <form action="{{route('products.update',$model->id)}}" method="post" id="alert-form">
                        @csrf
                        {{ method_field('put') }}
                        @include('dashboard.products.form')
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
