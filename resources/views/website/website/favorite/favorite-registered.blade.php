@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Favorites
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

<section style="margin-top: 2%;">
    <?php
        // the following condition is made on the "light" layout (and the other condition "dark" layout will be handled by else in a if condition)
        $now   = Carbon\Carbon::now();
        $start = Carbon\Carbon::createFromTimeString('00:00'); // 12:00 AM
        $end   = Carbon\Carbon::createFromTimeString('12:00')->addDay(); // 12:00 PM

        // if ($now->between($start, $end)) {  
        //     echo ....;
        // }
    ?>

    @if($favoriteItems_count == 0)
        <!-- empty area (because the "empty" from forelse loop will handle that error) -->
    @else
        <div class="alert alert-success" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%">
            <span>Number of items in your favorites ({{ $favoriteItems_count }})</span>
        </div>
    @endif

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

    @if(session()->has('removeFavorite_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('removeFavorite_message') }}
            {{-- <a href="{{route('favorites.restore',$favoriteItems->id)}}" onclick="return confirm('Are you sure that you want to restore ('$favoriteItems->product_name')';" class="btn btn-secondary btn-xs" type="button" title="{{'Restore'." ($favoriteItems->product_name)"}}"> Click here to undo action.</a> --}}
        </div>
    @endif

    <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap;">
        @forelse($favoriteItems as $favoriteItem)
            @if($now->between($start, $end))
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 pt-3 pb-3 bg-light border" style="border: 1px solid black; color: black;">
            @else
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 pt-3 pb-3 bg-dark border" style="border: 1px solid black; color: snow;">
            @endif
                    <div class="curriculum-event-thumb">
                        <a href="{{ route('single_product_page' , $favoriteItem->id) }}"><img src="{{$favoriteItem->product_image}}" alt="{{$favoriteItem->product_name}}" style="width: 180px; height: 200px; border: 2px solid black;"></a>
                    </div>
                    <div class="curriculum-event-content d-flex justify-content-center" >
                        <div class="row">
                            <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                <div class="c-red"><u>Title:</u><a href="{{ route('single_product_page' , $favoriteItem->id) }}" style="color: rgb(3, 3, 191);"> {{ $favoriteItem->product_name }}</a></div>
                                @if($favoriteItem->discount > 0)
                                    <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$favoriteItem->price}} EGP</del></div>
                                    <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$favoriteItem->price - ($favoriteItem->price * $favoriteItem->discount) }} EGP</span></div>
                                @elseif($favoriteItem->discount <= 0 || $favoriteItem->discount == null || $favoriteItem->discount == "")
                                    <div class="c-red"><u>Price:</u> {{$favoriteItem->price}} EGP</div>
                                @endif
                                <div class="c-red"><u>Category:</u> {{$favoriteItem->product_category}}</div>
                                @if($favoriteItem->is_accessory == 'no')
                                    <div class="c-red"><u>Clothing Type:</u>
                                        @if($favoriteItem->clothing_type == '1')
                                            Formal
                                        @elseif($favoriteItem->clothing_type == '2')
                                            Casual
                                        @else
                                            Sports Wear
                                        @endif
                                    </div>
                                @else <!-- elseif($favoriteItem->is_accessory == 'yes') -->
                                    <!-- empty -->
                                @endif
                            </div>
                        </div>
                    </div>
                    @auth
                        {{-- @if(auth()->user()->user_type == 'customer') --}}
                            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                                <!-- start add to cart -->
                                    <form action="{{ url('addCart' , $favoriteItem->id) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
                                        @csrf
                                        <div class="input-group">
                                            <!-- declaration for first field -->
                                            <input class="form-control input-sm" type="number" value="" min="" name="quantity" placeholder="Quantity">
                                    
                                            <!-- reducong the gap between them to zero -->
                                            <span class="input-group-btn" style="width: 5px;"></span>
                                    
                                            <!-- declaration for second field -->
                                            <input class="btn btn-primary form-control input-xs" type="submit" value="Add to cart" name="">
                                        </div>
                                    </form>
                                <!-- end add to cart -->

                                <!-- start add rating -->
                                    <form action="{{ url('addRating' , $favoriteItem->id) }}" method="POST" id="addRating-form" style="margin-top: 2%; margin-bottom: 3%;">
                                        @csrf
                                        <div class="input-group">                                    
                                            <select name="rating_level" class="form-control" onchange="this.form.submit()"> <!-- onchange="this.form.submit()" submits the form without the use of input/button type submit -->
                                                <option value="" selected>--- Select Your Rating ---</option>
                                                <option value="1">Poor</option>      <!----- Poor ----->
                                                <option value="2">Average</option>   <!----- Average ----->
                                                <option value="3">Good</option>      <!----- Good ----->
                                                <option value="4">Very Good</option> <!----- Very Good ----->
                                                <option value="5">Excellent</option> <!----- Excellent ----->
                                            </select>
                                        </div>
                                    </form>
                                <!-- end add rating -->
                                {!! Form::open([
                                    'route' => ['favorites.destroy',$favoriteItem->id],
                                    'method' => 'delete'
                                ])!!}
                                <button class="btn btn-danger btn-sm" style="width: 100%;" onclick="return confirm('{{__('Are you sure that you want to remove the ['.$favoriteItem->product_name.'] item from your favorites?')}}');" type="submit" title="{{__('Remove')." [$favoriteItem->product_name] item"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                                {!! Form::close() !!}
                            </div>
                        {{-- @endif --}}
                    @endauth

                    @if(Auth::guest())
                        <div style="margin-top: 2%; margin-bottom: 3%;">
                            <a href="{{ route('favorite-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                        </div>
                    @endif
            </div>
        @empty
            <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                <span>There are no products in your favorites yet!</span>
            </div> 
        @endforelse

    </div>
</section>
@endsection

@section('scripts')
@endsection



