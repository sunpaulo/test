<label for="">Category name</label>
<input type="text" class="form-control" name="name" placeholder="Category name"
       value="{{ $category->name or "" }}" required>

<label for="">Parent category</label>
<select name="parent_id" class="form-control">
    <option value="0">-- Without parent category --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr>

<input type="submit" value="Save" class="btn btn-primary">