<label for="">Product name</label>
<input type="text" class="form-control" name="name" placeholder="Product name"
       value="{{ $product->name or "" }}" required>

<label for="">Slug (unique)</label>
<input type="text" class="form-control" name="slug" placeholder="Automatic generation"
       value="{{ $product->slug or "" }}" readonly="">

<label for="categories">Categories</label>
<select name="categories[]" multiple="" id="categories" class="form-control" size="15">
    @include('admin.products.partials.categories', ['categories' => $categories])
</select>

<hr>

<input type="submit" value="Save" class="btn btn-primary">
