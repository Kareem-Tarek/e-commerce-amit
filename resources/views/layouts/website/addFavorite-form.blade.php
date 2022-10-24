<form id="submit_addFavorite_form" action="{{ url('addFavorite' , $product->id) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    {{-- <input class="btn btn-success btn" type="submit" value="Add to favorites" name="" style="width: 100%; border-radius: 4px;"> --}}
    <a class="add-to-favorites-btn" onclick="submit_addFavorite_form.submit()" style="width: 100%; text-align: center;" href="javascript:void(0);">Add To Favorites</a>
</form>

