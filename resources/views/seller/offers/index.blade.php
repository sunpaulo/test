@extends('seller.layouts.app_seller')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') My offers list @endslot
            @slot('parent') Main @endslot
            @slot('active') Offers @endslot
        @endcomponent

        <hr>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Product id</th>
                <th>Product name</th>
                <th class="text-left">Created at</th>
                <th class="text-left">Offered at</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($offers as $offer)
            <tr>
                <td>{{ $offer->id }}</td>
                <td>{{ $offer->product->getName() }}</td>
                <td>{{ $offer->product->getCreatedAt() }}</td>
                <td>{{ $offer->getCreatedAt() }}</td>
                <td>{{ $offer->getPrice() }}</td>
            </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                        <h2>No data</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $offers->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection