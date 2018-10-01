@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Offers list</h2>

        <hr>
        @if (!empty(Request::all()))
            <a href="{{ route('offer') }}" class="btn btn-primary">All</a>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Product</th>
                <th class="text-left">Created at</th>
                <th class="text-left">Offered by</th>
                <th>Price</th>
                @auth
                    @if(Auth::user()->getRole() === \App\Enums\Role::CUSTOMER)
                        <th class="text-center">Action</th>
                    @endif
                @endauth
            </tr>
            </thead>
            <tbody>
            @forelse($offers as $offer)
                <tr>
                    <td>
                        <a class="text-info" href="{{ route('offer') }}?product={{ $offer->product->getSlug() }}">
                            {{$offer->product->getName()}}
                        </a>
                    </td>
                    <td>{{ $offer->product->getCreatedAt() }}</td>
                    <td>
                        <a class="text-info" href="{{ route('offer') }}?seller-id={{ $offer->seller->getId() }}">
                            {{ $offer->seller->getName() }}
                        </a>
                    </td>
                    <td>{{ $offer->getPrice() }}</td>

                @auth
                    @if(Auth::user()->getRole() === \App\Enums\Role::CUSTOMER)
                        <td class="text-center">
                        @if( $offer->product->auctions()->with('customer')
                        ->where('auction.customer_id', Auth::id())
                        ->where('auction.status', \App\Enums\AuctionStatus::IN_PROGRESS)
                        ->doesntExist())
                            @include('customer.partials.init_auction')
                        @else
                            <button class="btn btn-success">Inited</button>
                        @endif
                        </td>
                    @endif
                @endauth
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
                <td colspan="5">
                    <ul class="pagination pull-right">
                        {{ $offers->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection