@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Products
@endsection

@section('content')
    <style>
        .hover-content{background-color: rgba(117, 117, 117, 0.4);}
        .hover-content-for-product-items{padding: 2% 0%;}
    </style>

    <!-- ***** Search bar Start ***** -->
    @include('layouts.website.search-bar')
    <!-- ***** Search bar End ***** -->

    <div class="product-items">

{{--         
        <!-- will be added to the supplier when adding a new product & setting the price for it -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <input required name="value" id="value" class="form-control" placeholder="Enter a value" type="number" autocomplete="off" onkeyup="$('#gain_value').val($(this).val() - ($(this).val()*10/100) );$('.gain_value').text($(this).val()- ($(this).val()*10/100) );">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <input required disabled class="form-control" placeholder="You will get" id="gain_value" type="number" autocomplete="off">
        </div> --}}

                    <!-- ***** Men Area Starts ***** -->
                <section class="section" id="men">

                    <div class="container">
                        
                        @if(session()->has('addCart_message'))
                            <div class="alert alert-success text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('addCart_message') }}<a href="{{ route('cart-registered') }}"> Check your cart</a>.
                            </div>
                        @elseif(session()->has('quantity_is_null_message'))
                            <div class="alert alert-danger text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('quantity_is_null_message') }}
                            </div>
                        @elseif(session()->has('quantity_is_zero_message'))
                            <div class="alert alert-danger text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('quantity_is_zero_message') }}
                            </div>
                        @elseif(session()->has('quantity_is_negative_message'))
                            <div class="alert alert-danger text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('quantity_is_negative_message') }}
                            </div>
                        @endif

                        @if(session()->has('addRating_message'))
                            <div class="alert alert-success text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('addRating_message') }}
                            </div>
                        @endif

                        @if(session()->has('addFavorite_message'))
                            <div class="alert alert-success text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('addFavorite_message') }}<a href="{{ route('favorites-registered') }}"> Check your favorites</a>.
                            </div>
                        @elseif(session()->has('addFavorite_already_added_message'))
                            <div class="alert alert-danger text-center" style="width: 70%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('addFavorite_already_added_message') }}
                            </div>
                        @endif
                        
                        @auth
                            @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
                                <a href="{{route('products.create')}}" class="btn btn-dark" style="float:right;" type="button" title="Add New Product">Add New Product</a>
                            @endif
                        @endauth

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Men's Latest</h2>
                                    @if(session()->has('addRating_men_message'))
                                        <div class="alert alert-success text-center" style="width: %; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                            {{ session()->get('addRating_men_message') }}
                                        </div>
                                    @endif
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
                                        @if(isset($clothes_men))
                                            @foreach ( $clothes_men as $product )
                                            <div class="item">
                                                <div class="thumb">
                                                    <div class="hover-content hover-content-for-product-items">
                                                        <ul>
                                                            <li><a href="{{ route('single_product_page' , $product->id) }}" class="products-hover-icons eye-button"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="products-hover-icons star-button"><i class="fa fa-star"></i></a></li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="products-hover-icons add-to-cart-button" product-id="{{ $product->id }}"
                                                                user-id="{{ auth()->user()->id ?? 0 }}">
                                                                    <i class="fa-solid fa-cart-plus"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{ route('single_product_page' , $product->id) }}">
                                                        <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="height: 450px; width: 100%; border: 2px solid black;">
                                                        @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                                        @if($data <= 7) <!---------- in days ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(0, 69, 175, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">NEW</h3>
                                                            </span>
                                                        {{-- @else <!---------- any other condition which is => more than the given period in the prevoious condition ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(175, 105, 0, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">OLD</h3>
                                                            </span> --}}
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="down-content">
                                                    <a href="{{ route('single_product_page' , $product->id) }}"><h4>{{ $product->name }}</h4></a>
                                                    @if($product->discount > 0)
                                                    <span><del style="color: red;">{{ $product->price }} EGP</del> <label style="color: #000;">&RightArrow;</label> {{ $product->price - ($product->price * $product->discount) }} EGP <span style="color:rgb(155, 31, 151); font-weight: bold; display:inline-block;">({{ $product->discount * 100 }}% OFF)</span></span>
                                                    @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                                        <span>{{ $product->price }} EGP</span>
                                                    @endif
                                                    {{-- <ul class="stars pr-1"><br>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul> --}}
                                                    @auth
                                                        @if(auth()->user()->user_type == 'admin')
                                                            @include('layouts.website.admin-product-control-website')
                                                        @elseif(auth()->user()->user_type == 'customer')
                                                            @include('layouts.website.addCart-form')
                                                            @include('layouts.website.addRating-form')
                                                            @include('layouts.website.addFavorite-form')
                                                        @endif
                                                    @endauth

                                                    @if(Auth::guest())
                                                        <div style="margin-top: 2%; margin-bottom: 2%;">
                                                            <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                            <a href="{{ route('favorites-unregistered') }}"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ***** Men Area Ends ***** -->

                <!-- ***** Women Area Starts ***** -->
                <section class="section" id="women">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Women's Latest</h2>
                                    @if(session()->has('addRating_women_message'))
                                        <div class="alert alert-success text-center" style="width: %; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                            {{ session()->get('addRating_women_message') }}
                                        </div>
                                    @endif
                                    <span>Details to details is what makes AA different from the other themes.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="women-item-carousel">
                                    <div class="owl-women-item owl-carousel">
                                        @if(isset($clothes_women))
                                            @foreach ( $clothes_women as $product )
                                            <div class="item">
                                                <div class="thumb">
                                                    <div class="hover-content hover-content-for-product-items">
                                                        <ul>
                                                            <li><a href="{{ route('single_product_page' , $product->id) }}" class="products-hover-icons eye-button"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="products-hover-icons star-button"><i class="fa fa-star"></i></a></li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="products-hover-icons add-to-cart-button" product-id="{{ $product->id }}"
                                                                user-id="{{ auth()->user()->id ?? 0 }}">
                                                                    <i class="fa-solid fa-cart-plus"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{ route('single_product_page' , $product->id) }}">
                                                        <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="height: 450px; width: 100%; border: 2px solid black;">
                                                        @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                                        @if($data <= 7) <!---------- in days ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(0, 69, 175, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">NEW</h3>
                                                            </span>
                                                        {{-- @else <!---------- any other condition which is => more than the given period in the prevoious condition ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(175, 105, 0, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">OLD</h3>
                                                            </span> --}}
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="down-content">
                                                    <a href="{{ route('single_product_page' , $product->id) }}"><h4>{{ $product->name }}</h4></a>
                                                    @if($product->discount > 0)
                                                    <span><del style="color: red;">{{ $product->price }} EGP</del> <label style="color: #000;">&RightArrow;</label> {{ $product->price - ($product->price * $product->discount) }} EGP <span style="color:rgb(155, 31, 151); font-weight: bold; display:inline-block;">({{ $product->discount * 100 }}% OFF)</span></span>
                                                    @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                                        <span>{{ $product->price }} EGP</span>
                                                    @endif
                                                    {{-- <ul class="stars pr-1"><br>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul> --}}
                                                    @auth
                                                        @if(auth()->user()->user_type == 'admin')
                                                            @include('layouts.website.admin-product-control-website')
                                                        @elseif(auth()->user()->user_type == 'customer')
                                                            @include('layouts.website.addCart-form')
                                                            @include('layouts.website.addRating-form')
                                                            @include('layouts.website.addFavorite-form')
                                                        @endif
                                                    @endauth

                                                    @if(Auth::guest())
                                                        <div style="margin-top: 2%; margin-bottom: 2%;">
                                                            <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                            <a href="{{ route('favorites-unregistered') }}"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Women Area Ends ***** -->

                <!-- ***** Kids Area Starts ***** -->
                <section class="section" id="kids">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Kid's Latest</h2>
                                    @if(session()->has('addRating_kids_message'))
                                        <div class="alert alert-success text-center" style="width: %; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                            {{ session()->get('addRating_kids_message') }}
                                        </div>
                                    @endif
                                    <span>Details to details is what makes AA different from the other themes.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="kid-item-carousel">
                                    <div class="owl-kid-item owl-carousel">
                                        @if(isset($clothes_kids))
                                            @foreach ( $clothes_kids as $product )
                                            <div class="item">
                                                <div class="thumb">
                                                    <div class="hover-content hover-content-for-product-items">
                                                        <ul>
                                                            <li><a href="{{ route('single_product_page' , $product->id) }}" class="products-hover-icons eye-button"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="products-hover-icons star-button"><i class="fa fa-star"></i></a></li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="products-hover-icons add-to-cart-button" product-id="{{ $product->id }}"
                                                                user-id="{{ auth()->user()->id ?? 0 }}">
                                                                    <i class="fa-solid fa-cart-plus"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{ route('single_product_page' , $product->id) }}">
                                                        <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="height: 450px; width: 100%; border: 2px solid black;">
                                                        @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                                        @if($data <= 7) <!---------- in days ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(0, 69, 175, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">NEW</h3>
                                                            </span>
                                                        {{-- @else <!---------- any other condition which is => more than the given period in the prevoious condition ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(175, 105, 0, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">OLD</h3>
                                                            </span> --}}
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="down-content">
                                                    <a href="{{ route('single_product_page' , $product->id) }}"><h4>{{ $product->name }}</h4></a>
                                                    @if($product->discount > 0)
                                                    <span><del style="color: red;">{{ $product->price }} EGP</del> <label style="color: #000;">&RightArrow;</label> {{ $product->price - ($product->price * $product->discount) }} EGP <span style="color:rgb(155, 31, 151); font-weight: bold; display:inline-block;">({{ $product->discount * 100 }}% OFF)</span></span>
                                                    @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                                        <span>{{ $product->price }} EGP</span>
                                                    @endif
                                                    {{-- <ul class="stars pr-1"><br>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul> --}}
                                                    @auth
                                                        @if(auth()->user()->user_type == 'admin')
                                                            @include('layouts.website.admin-product-control-website')
                                                        @elseif(auth()->user()->user_type == 'customer')
                                                            @include('layouts.website.addCart-form')
                                                            @include('layouts.website.addRating-form')
                                                            @include('layouts.website.addFavorite-form')
                                                        @endif
                                                    @endauth

                                                    @if(Auth::guest())
                                                        <div style="margin-top: 2%; margin-bottom: 2%;">
                                                            <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                            <a href="{{ route('favorites-unregistered') }}"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Kids Area Ends ***** -->

                <!-- ***** Accessories Area Starts ***** -->
                <section class="section" id="accessories">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Accessories</h2>
                                    @if(session()->has('addRating_accessories_message'))
                                        <div class="alert alert-success text-center" style="width: %; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                            {{ session()->get('addRating_accessories_message') }}
                                        </div>
                                    @endif
                                    <span>Some of the Accessories...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="kid-item-carousel">
                                    <div class="owl-kid-item owl-carousel">
                                        @if(isset($some_accessories))
                                            @foreach ( $some_accessories as $product )
                                            <div class="item">
                                                <div class="thumb">
                                                    <div class="hover-content hover-content-for-product-items">
                                                        <ul>
                                                            <li><a href="{{ route('single_product_page' , $product->id) }}" class="products-hover-icons eye-button"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="products-hover-icons star-button"><i class="fa fa-star"></i></a></li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="products-hover-icons add-to-cart-button" product-id="{{ $product->id }}"
                                                                user-id="{{ auth()->user()->id ?? 0 }}">
                                                                    <i class="fa-solid fa-cart-plus"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="{{ route('single_product_page' , $product->id) }}">
                                                        <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="height: 450px; width: 100%; border: 2px solid black;">
                                                        @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                                        @if($data <= 7) <!---------- in days ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(0, 69, 175, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">NEW</h3>
                                                            </span>
                                                        {{-- @else <!---------- any other condition which is => more than the given period in the prevoious condition ---------->
                                                            <span style="position: absolute;  top: 1px; background: rgba(175, 105, 0, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                                <h3 style="font-weight: bolder;">OLD</h3>
                                                            </span> --}}
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="down-content">
                                                    <a href="{{ route('single_product_page' , $product->id) }}"><h4>{{ $product->name }}</h4></a>
                                                    @if($product->discount > 0)
                                                    <span><del style="color: red;">{{ $product->price }} EGP</del> <label style="color: #000;">&RightArrow;</label> {{ $product->price - ($product->price * $product->discount) }} EGP <span style="color:rgb(155, 31, 151); font-weight: bold; display:inline-block;">({{ $product->discount * 100 }}% OFF)</span></span>
                                                    @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                                        <span>{{ $product->price }} EGP</span>
                                                    @endif
                                                    {{-- <ul class="stars pr-1"><br>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul> --}}
                                                    @auth
                                                        @if(auth()->user()->user_type == 'admin')
                                                            @include('layouts.website.admin-product-control-website')
                                                        @elseif(auth()->user()->user_type == 'customer')
                                                            @include('layouts.website.addCart-form')
                                                            @include('layouts.website.addRating-form')
                                                            @include('layouts.website.addFavorite-form')
                                                        @endif
                                                    @endauth

                                                    @if(Auth::guest())
                                                        <div style="margin-top: 2%; margin-bottom: 2%;">
                                                            <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                            <a href="{{ route('favorites-unregistered') }}"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Accessories Area Ends ***** -->

    </div>
    
    @include('layouts.website.social-media')

@endsection


@section('scripts')
@endsection



