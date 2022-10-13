@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    {{ $product->name ?? '[Product Name Here]' }}
    ({{ 'ID: '.$product->id }}) 
@endsection

@section('content')
    <!-- ***** Search bar Start ***** -->
    @include('layouts.website.search-bar')
    <!-- ***** Search bar End ***** -->

    <div style="margin-top: -7%;">
        <!-- ***** Main Banner Area Start ***** -->
        <div class="page-heading" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-content">
                            <h2 style="background-color: rgb(193, 193, 134);">{{ $product->name ?? '[Product Name Here]' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->


        <!-- ***** Product Area Starts ***** -->
        <section class="section" id="product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                    <div class="left-images">
                        <img src="assets/images/single-product-01.jpg" alt="">
                        <img src="assets/images/single-product-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>New Green Jacket</h4>
                        <span class="price" style="color: snow; background-color: rgb(193, 193, 134);">{{ $product->price ?? '[Product Price Here]' }} EGP</span>
                        {{-- <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul> --}}
                        @auth
                            @if(auth()->user()->user_type == "customer")
                                @include('layouts.website.addRating-form')
                                @include('layouts.website.addFavorite-form')
                            @endif
                        @endauth
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        @auth
                            @if(auth()->user()->user_type == "customer")
                                <div class="quantity-content">
                                    <div class="left-content">
                                        <h6 style="color: snow; background-color: rgb(193, 193, 134);">Quantity (Number of Product Quantity Here -> in the input)</h6>
                                    </div>
                                    <div class="right-content">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                        </div>
                                    </div>
                                </div>
                                <div class="total">
                                    <h4>Total: $210.00</h4>
                                    <div class="main-border-button"><a href="javascript:void(0);">Add To Cart</a></div>
                                </div>
                            @endif
                        @endauth
                        @if(!auth()->user())
                            <div class="main-border-button"><a href="{{ route('cart-unregistered') }}">Add To Cart</a></div>
                        @endif
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- ***** Product Area Ends ***** -->
    </div>

    <hr>
    
    @include('layouts.website.social-media')

@endsection


@section('scripts')
@endsection



