<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <div class="col-md-12">
        <label>Category name</label>
        <input type="text" class="form-control" name="title" placeholder="Category name"
               value="{{ $category->title or "" }}" required>

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
    <div class="col-md-12">
        <label>Parent category</label>
        <select name="parent_id" class="form-control">
            <option value="">-- Without parent category --</option>
            @include('admin.categories.partials.categories', ['categories' => $categories])
        </select>

        @if ($errors->has('parent_id'))
            <span class="help-block">
                <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<hr>

<input type="submit" value="Save" class="btn btn-primary">
