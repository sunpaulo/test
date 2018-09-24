@extends('layouts.app')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Products list @endslot
            @slot('parent') Main @endslot
            @slot('active') Products @endslot
        @endcomponent

        <hr>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Product name</th>
                <th class="text-left">Created at</th>
                <th class="text-center">Quantity of offer</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->getName() }}</td>
                    <td class="text-left">{{ $product->getCreatedAt() }}</td>
                    <td class="text-center">{{ $product->offers()->count() }}</td>
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