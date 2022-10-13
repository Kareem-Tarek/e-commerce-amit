<form action="{{ url('addRating' , $product->id) }}" method="POST" id="addRating-form" style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    <div class="input-group">
        {{-- <!-- declaration for first field -->
        <input class="form-control input-sm" type="number" value="1" min="1" name="rating_level">
  
        <!-- reducong the gap between them to zero -->
        <span class="input-group-btn" style="width: 5px;"></span>
  
        <!-- declaration for second field -->
        <input class="btn btn-primary" type="submit" value="Rating" name="" style="width: 35%;"> --}}

        <!------------------------------------------------------------------------------------------------------------>

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
