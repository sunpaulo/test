<label for="">Product name</label>
<input type="text" class="form-control" name="title" value="{{ $product->name }}" required readonly="readonly">

<label for="">Price</label>
<input type="text" class="form-control" name="price" placeholder="Price"
       value="" required>

<hr>

<input type="submit" value="Save" class="btn btn-primary">