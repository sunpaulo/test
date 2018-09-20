<label for="">Product title</label>
<input type="text" class="form-control" name="name" placeholder="Product title"
       value="{{ $product->name or "" }}" required>

<label for="categories">Categories</label>
<select name="categories[]" multiple="" id="categories" class="form-control" size="15">
    @include('admin.products.partials.categories', ['categories' => $categories])
</select>

<hr>

<input type="submit" value="Save" class="btn btn-primary">
