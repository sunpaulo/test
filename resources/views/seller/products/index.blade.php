@extends('seller.layouts.app_seller')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Products list @endslot
            @slot('parent') Main @endslot
            @slot('active') Products @endslot
        @endcomponent

        <hr>

        @include('seller.products.partials.radio')

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Product name</th>
                <th class="text-left">Created at</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                @if ($product->offers()->where('seller_id', Auth::id())->exists())
                    <tr>
                        <td class="bg-success">{{ $product->getName() }}</td>
                        <td class="bg-success text-left">{{ $product->getCreatedAt() }}</td>
                        <td class="bg-success text-center"><span class="btn-sm btn-default">Is offered</span></td>
                @else
                    <tr>
                            <td>{{ $product->getName() }}</td>
                            <td class="text-left">{{ $product->getCreatedAt() }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ route('seller.product.show', $product)}}">
                                    Add offer
                                </a>
                            </td>
                        @endif
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <h2>No data</h2>
                            </td>
                        </tr>
                    @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $products->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection