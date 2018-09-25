<label for="">Product name</label>
<p>{{ $product->name }}</p>

<label for="">Price</label>
<input type="text" class="form-control" name="price" placeholder="Price"
       value="{{ $offer->price or "" }}" required>
<hr>

<input type="submit" value="Save" class="btn btn-primary">