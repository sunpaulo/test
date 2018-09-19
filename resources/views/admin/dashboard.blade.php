@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p>
                        <a href="{{ route('admin.category.index') }}" class="label label-primary">
                            Categories {{ $categories_count }}
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p>
                        <a href="{{ route('admin.product.index') }}" class="label label-primary">
                            Products {{ $products_count }}
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Quests 0</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Today 0</span></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-default">Create category</a>
                @foreach($categories as $category)
                    <a href="{{ route('admin.category.edit', $category) }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $category->title }}</h4>
                        <p class="list-group-item-text">
                            Products with same category:
                            {{ $category->products()->count() }}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.product.create') }}" class="btn btn-block btn-default">Create product</a>
                @foreach($products as $product)
                    <a href="{{ route('admin.product.edit', $product) }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $product->name }}</h4>
                        <p class="list-group-item-text">
                            {{ $product->categories()->pluck('title')->implode(', ') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection