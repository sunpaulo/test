<label for="">Product name</label>
<p>{{ $product->name }}</p>

<label for="price">Price</label>
<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    <input type="text" id="price" class="form-control" name="price" placeholder="Price"
           value="{{ $offer->price or "" }}" required>
    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>
<hr>



<input type="submit" value="Save" class="btn btn-primary">