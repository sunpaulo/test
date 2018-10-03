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
                <th class="text-center">Prices</th>
                <th class="text-center">Date of creation</th>
                <th class="text-center">Sellers</th>
                <th class="text-right">Status/Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($auctions as $auction)
                <tr>
                    <td>{{ $auction->product->getName() }}</td>
                    <td class="text-center">
                        {{ $auction->rates()->orderBy('value')->take(10)->pluck('value')->implode(', ')}}
                    </td>
                    <td class="text-center">{{ $auction->getCreatedAt() }}</td>
                    <td class="text-center">{{ $auction->rates()->count() }}</td>
                    <td class="text-right">
                        @if ($auction->status === \App\Enums\AuctionStatus::IN_PROGRESS)
                            <a href="{{ route('customer.order.create') }}?auction={{ $auction->getId() }}" class="btn
                            btn-primary">Finish</a>
                        @else
                        <button class="btn btn-success">Ordered</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <h2>No data</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <ul class="pagination pull-right">
                        {{ $auctions->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection