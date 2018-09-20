@foreach($categories as $category)
    <option value="{{ $category->id or "" }}"

            @isset($product->id)
                @foreach($product->categories as $category_product)
                    @if ($category->id == $category_product->id)
                    selected="selected"
                    @endif
                @endforeach
            @endisset
    >
        {!! $delimiter or "" !!}{{ $category->title or "" }}
    </option>

    @if (count($category->children) > 0)
        @include('admin.products.partials.categories', [
            'categories' => $category->children,
            'delimiter' => ' - ' . $delimiter
        ])
    @endif
@endforeach