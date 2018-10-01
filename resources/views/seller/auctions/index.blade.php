@extends('customer.layouts.app')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Auctions @endslot
            @slot('parent') Main @endslot
            @slot('active') Auctions @endslot
        @endcomponent

        <hr>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Product name</th>
                <th class="text-left">Prices</th>
                <th class="text-center">Date of creation</th>
                <th class="text-center">Origin Price</th>
                <th class="text-right">Update</th>
            </tr>
            </thead>
            <tbody>
            @forelse($auctions as $auction)
                <tr>
                    <td>{{ $auction->product_id . $auction->product->getName() }}</td>
                    <td>{{ $auction->rates()->orderBy('value')->take(10)->pluck('value')->implode(', ') }}</td>
                    <td>{{ $auction->getCreatedAt() }}</td>
                    <td>{{ $auction->getOriginPrice() }}</td>
                    <td class="text-right">
                        {{ \App\Models\Rate::where('seller_id', Auth::id())->where('auction_id', $auction->id)->first()->value ?? 'empty' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h2>No data</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <ul class="pagination pull-right">
                        {{ $auctions->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection