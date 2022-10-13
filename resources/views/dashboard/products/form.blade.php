<div class="tab-pane mt-4" role="tabpanel">

    <div class="form-group row">
        <label class="form-label col-lg-3">Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $model->name}}" type="text" name="name" placeholder="Enter product name" autocomplete="off">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Description <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('description') is-invalid @enderror" value="{{Request::old('description') ? Request::old('description') : $model->description}}" type="text" name="description" placeholder="Enter product description" autocomplete="off">
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Image <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('image_name') is-invalid @enderror" value="{{Request::old('image_name') ? Request::old('image_name') : $model->image_name}}" type="file" name="image_name" autocomplete="off">
            @error('image_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Price <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('price') is-invalid @enderror" value="{{Request::old('price') ? Request::old('price') : $model->price}}" type="text" name="price" placeholder="Enter product price" autocomplete="off">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Clothing Type <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {{-- @inject('clothing_type','App\Models\Category')
            {!! Form::select('id',$clothing_type->pluck('name','id'),[
                'placeholder' => 'Please select a clothing type',
                'class'       => 'form-control select'. ( $errors->has('clothing_type') ? ' is-invalid' : '' ),
            ]) !!} --}}
            <select name="clothing_type" class="form-control select @error('clothing_type') is-invalid @enderror" value="{{Request::old('clothing_type') ? Request::old('clothing_type') : $model->clothing_type}}">
                <option> ---------- Please select an option ---------- </option>
                <option value="1" {{ isset($model) && $model->clothing_type == 1 ? 'selected'  : '' }}>Formal</option>
                <option value="2" {{ isset($model) && $model->clothing_type == 2 ? 'selected'  : '' }}>Casual</option>
                <option value="3" {{ isset($model) && $model->clothing_type == 3 ? 'selected'  : '' }}>Sports Wear</option>
            </select>
            @error('clothing_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Accessory? <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="is_accessory" class="form-control select @error('is_accessory') is-invalid @enderror" value="{{Request::old('is_accessory') ? Request::old('is_accessory') : $model->is_accessory}}">
                <option> ---------- Please select an option ---------- </option>
                <option value="yes" {{ isset($model) && $model->is_accessory == 'yes' ? 'selected'  : '' }}>Yes</option>
                <option value="no" {{ isset($model) && $model->is_accessory == 'no' ? 'selected'  : '' }}>No</option>
            </select>
            @error('is_accessory')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Product Category <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="product_category" class="form-control select @error('product_category') is-invalid @enderror" value="{{Request::old('product_category') ? Request::old('product_category') : $model->product_category}}">
                <option> ---------- Please select an option ---------- </option>
                <option value="men" {{ isset($model) && $model->product_category == 'men' ? 'selected'  : '' }}>Men</option>
                <option value="women" {{ isset($model) && $model->product_category == 'women' ? 'selected'  : '' }}>Women</option>
                <option value="kids" {{ isset($model) && $model->product_category == 'kids' ? 'selected'  : '' }}>Kids</option>
            </select>
            @error('product_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>

