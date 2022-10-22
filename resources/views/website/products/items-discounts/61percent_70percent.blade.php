@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Discounts 61% ~ 70% - results ({{ $items_count }})
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

<section style="margin-top: 3%;">
    @if($items_count == 0)
        <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%">
            <span>Discounts on items between [61% ~ 70%] - results ({{ $items_count }})</span>
        </div>
    @else
        <div class="alert alert-primary" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%">
            <span>Discounts on items between [61% ~ 70%] - results ({{ $items_count }})</span>
        </div>
    @endif

    @auth
        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
            <div class="d-flex justify-content-center mb-4">
                <a href="{{route('products.create')}}" class="btn btn-dark" style="" type="button" title="Add New Product">Add New Product</a>
            </div>    
        @endif
    @endauth

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

    <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap; padding: 0% 2%;">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3 pt-3 pb-3 bg-light border">
                    <div class="curriculum-event-thumb">
                        <a href="{{ route('single_product_page' , $product->id) }}">
                            @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                            @if($data <= 7) <!---------- in days ---------->
                                <span class="mt-2" style="position: absolute; background: rgba(0, 69, 175, 0.65); width: 180px; height: 35px; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                    <h3 style="font-weight: bolder;">NEW</h3>
                                </span>
                            @endif
                            <img class="mt-2" src="{{$product->image_name}}" alt="{{$product->name}}" style="width: 180px; height: 200px; border: 2px solid black;">
                        </a>
                    </div>
                    <div class="curriculum-event-content d-flex justify-content-center" >
                        <div class="row">
                            <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                <div class="c-red"><u>Title:</u><a href="{{ route('single_product_page' , $product->id) }}" style="color: rgb(3, 3, 191);"> {{ $product->name }}</a></div>
                                @if($product->discount > 0)
                                    <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$product->price}} EGP</del></div>
                                    <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$product->price - ($product->price * $product->discount) }} EGP</span> <span style="color:rgb(155, 31, 151); font-weight: bold;">({{ $product->discount * 100 }}% OFF)</span></div>
                                @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                    <div class="c-red"><u>Price:</u> {{$product->price}} EGP</div>
                                @endif
                                <div class="c-red"><u>Category:</u> {{ucfirst($product->product_category)}}</div>
                                @if($product->is_accessory == 'no')
                                    <div class="c-red"><u>Clothing Type:</u>
                                        @if($product->clothing_type == '1')
                                            Formal
                                        @elseif($product->clothing_type == '2')
                                            Casual
                                        @else
                                            Sports Wear
                                        @endif
                                        
                                        {{-- @inject('categories_clothing_type','App\Models\Category')
                                        {!! Form::select('name',$categories_clothing_type->pluck('name','id')) !!} --}}
                                    </div>
                                @else <!-- elseif($product->is_accessory == 'yes') -->
                                    <!-- empty -->
                                @endif
                            </div>
                        </div>
                    </div>
                    @auth
                        @if(auth()->user()->user_type == 'admin')
                            @include('layouts.website.admin-product-control-website')
                        @elseif(auth()->user()->user_type == 'customer')
                            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                                @include('layouts.website.addCart-form')
                                @include('layouts.website.addRating-form')
                                @include('layouts.website.addFavorite-form')
                            </div>
                        @endif
                    @endauth

                    @if(Auth::guest())
                        <div style="margin-top: 2%; margin-bottom: 3%;">
                            <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                            <a href="{{ route('favorites-unregistered') }}"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                        </div>
                    @endif
            </div>
         {{-- @empty
            <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                <span>No data found!</span>
            </div> 
            <?php 
                /* 
                @empty => acts like else from the if condition and for showing the other choice wich will be the error 
                (or the undefined data from the DB) if the data wasn't found in the code in "forelse" loop.
                */ 
             ?> --}}
        @endforeach
    </div>
</section>
@endsection

@section('scripts')
@endsection


