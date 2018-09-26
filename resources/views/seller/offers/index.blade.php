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
                <th class="col-sm-3 text-left">Product name</th>
                <th class="col-sm-3 text-center">Count of orders</th>
                <th class="col-sm-3 text-center">Competitor prices</th>
                <th class="col-sm-3 text-right">Set new price</th>
            </tr>
            </thead>
            <tbody>
            @forelse($offers as $offer)
            <tr>
                <td class="text-left">{{ $offer->product->getName() }}</td>
                <td class="text-center">{{ $offer->orders->count() }}</td>
                <td class="text-center">
                {{-- Check if product has offers from other sellers --}}
                @if ($offer->product->offers()->where('id', '<>', $offer->getId())->count() > 0)
                    {{ $offer->product
                        ->offers()
                            ->where('id', '<>', $offer->getId())
                            ->orderBy('price')
                            ->limit(5)
                            ->distinct()
                            ->pluck('price')
                            ->implode(', ')
                    }}
                @else
                    <span class="label label-info">Empty</span>
                @endif
                </td>
                <td class="text-right">
                    <a class="btn btn-primary" href="{{ route('seller.offer.edit', $offer) }}">
                        {{ $offer->getPrice() }}
                    </a>
                </td>
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