@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    {{ $product->name.' (ID: '.$product->id.')' }}
@endsection

@section('content')
<style>
    .session-message{
        width: 60%; 
        margin-top: 1%; 
        margin-bottom: 3%; 
        margin-left: auto; 
        margin-right: auto;
    }
</style>

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
                            <p style="color: snow; font-size: 300%; font-weight: bolder; font-family:Verdana, Geneva, Tahoma, sans-serif;">{{ $product->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        @if(session()->has('addCart_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addCart_message') }}<a href="{{ route('cart-registered') }}"> Check your cart</a>.
        </div>
    @elseif(session()->has('quantity_is_null_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('quantity_is_null_message') }}
        </div>
    @elseif(session()->has('quantity_is_zero_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('quantity_is_zero_message') }}
        </div>
    @elseif(session()->has('quantity_is_negative_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('quantity_is_negative_message') }}
        </div>
    @endif
    
    @if(session()->has('addRating_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addRating_message') }}
        </div>
    @endif

    @if(session()->has('addFavorite_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addFavorite_message') }}<a href="{{ route('favorites-registered') }}"> Check your favorites</a>.
        </div>
    @elseif(session()->has('addFavorite_already_added_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addFavorite_already_added_message') }}
        </div>
    @endif

        <!-- ***** Product Area Starts ***** -->
        <section class="section" id="product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                    <div class="left-images">
                        {{-- <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="width: 250px; height: 350px;">
                        <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="width: 250px; height: 350px;"> --}}
                        
                        <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="width: 250px; height: 350px; margin-left: auto; margin-right: auto;">
                        @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                        @if($data <= 7) <!---------- in days ---------->   
                            <span style="position: absolute; left: 15px; background: rgba(0, 69, 175, 0.65); width: 250px; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                <h3 style="font-weight: bolder;">NEW</h3>
                            </span>
                        @endif

                        <!-- Product Items Starts -->
                        <div class="product-items mt-2">
                            <section class="section" id="women">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <div class="section-heading text-center">
                                                <h3 style="font-weight: bolder;">Check the other pictures of the product below...</h3>
                                                <span>Details to details is what makes AA different from the other themes.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="men-item-carousel">
                                                <div class="owl-men-item owl-carousel">
                                                    @forelse($productItem_id as $productItem)
                                                    <div class="item">
                                                        <div class="thumb">
                                                            <a href="{{ route('single_product_page' , $productItem) }}">
                                                                <img src="{{ $productItem->image_name }}" alt="{{ $productItem->name }}" style="height: 450px; width: 100%; border: 2px solid black;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Product Items Ends -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $product->name }}</h4>
                        @if($product->discount > 0)
                            <span style="display:inline-block; font-size: 100%;">Old Price:</span>&nbsp;<span class="old-price" style="font-size: 100%; color: red; display:inline-block;"><del>{{ $product->price }} EGP</del></span><br>
                            <span style="display:inline-block; font-size: 100%;">Sale Price:</span>&nbsp;<span class="price" style="font-size: 150%; color: green; display:inline-block;">{{ $product->price - ($product->price * $product->discount) }} EGP</span>
                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                        <span style="display:inline-block; font-size: 100%;">Price:</span>&nbsp;<span class="price" style="display:inline-block; font-size: 130%;">{{ $product->price }} EGP</span>
                        @endif
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

                        <hr>

                        <div class="quote">
                            <span style="font-size: 100%;"><u>Product description:</u></span>
                            <i class="fa fa-quote-left"></i><br>
                            <p>{{ $product->description }}.</p>
                            <i class="fa fa-quote-right" style="float: right;"></i>
                            <br>
                        </div>

                        @auth
                            @if(auth()->user()->user_type == "customer")
                                <hr>
                                <div class="total">
                                    <!-- start add to cart -->
                                    <form id="submit_addCart_form" action="{{ url('addCart' , $product->id) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
                                        @csrf
                                        <div class="input-group">
                                            <!-- declaration for first field -->
                                            <input class="form-control input-sm" type="number" value="1" min="0" name="quantity" placeholder="Quantity">
                                    
                                            <!-- reducong the gap between them to zero -->
                                            <span class="input-group-btn" style="width: 30px;"></span>
                                    
                                            <!-- declaration for second field -->
                                            {{-- <input class="btn btn-primary form-control input-xs" type="submit" value="Add to cart" name=""> --}}
                                            <div class="main-border-button"><a style="padding: 9px 25px !important;" onclick="submit_addCart_form.submit()" href="javascript:void(0);">Add To Cart</a></div>
                                        </div>
                                    </form>
                                    <!-- end add to cart -->
                                </div>
                            @elseif(auth()->user()->user_type == "admin")
                                <hr>
                                @include('layouts.website.admin-product-control-website')
                            @endif
                        @endauth

                        @if(!auth()->user())
                            <hr>
                            <div>
                                <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                <a href="{{ route('favorites-unregistered') }}"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                            </div>
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



