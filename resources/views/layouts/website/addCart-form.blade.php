<form id="submit_addCart_form" action="{{ url('addCart' , $product->id) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    <div class="input-group">
        <!-- declaration for first field -->
        <input class="form-control input-sm" type="number" value="1" min="" name="quantity" placeholder="Quantity">

        <!-- reducong the gap between them to zero -->
        <span class="input-group-btn" style="width: 5px;"></span>

        <!-- declaration for second field -->
        {{-- <input class="btn btn-primary form-control input-xs" type="submit" value="Add to cart" name=""> --}}
        <div class="main-border-button"><a onclick="submit_addCart_form.submit()" href="javascript:void(0);">Add To Cart</a></div>
                <style>
                    .main-border-button a {
                        font-size: 13px;
                        color: #2a2a2a;
                        border: 1px solid #2a2a2a;
                        padding: 9px 25px;
                        display: inline-block;
                        font-weight: 500;
                        transition: all .3s;
                    }

                    .main-border-button a:hover {
                        background-color: #2a2a2a;
                        color: snow;
                    }
                </style>
    </div>

    {{-- <input class="form-control" type="number" value="1" min="1" name="quantity" style="width: 20%; margin-right: auto; margin-left: auto;">
    <input class="btn btn-primary" type="submit" value="Add to cart" name="" style="margin-top: 1%; padding: 1.5% 3%; border-radius: 4px;"> --}}

    {{-- <table>
        <tr>
            <td><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="margin-top: 1%; border-radius: 4px;"></td>
            <td><input class="form-control" type="number" value="1" min="1" name="quantity" style="width: 36%;"></td>
        </tr>
    </table> --}}
</form>

