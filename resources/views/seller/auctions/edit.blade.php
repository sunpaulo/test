@extends('seller.layouts.app')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Update Rate @endslot
            @slot('parent') Main @endslot
            @slot('active') Auction @endslot
        @endcomponent

        <hr>

        <label for="">Product name</label>
        <p>{{ $auction->product->getName() }}</p>

        @if($competitorsPrices)
        <label for="">Сompetitors prices</label>
        <p>{{ $competitorsPrices }}</p>
        @endif

        <form action="{{ route('seller.rate.update', $myRate) }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            {{-- Form include --}}

            @include('seller.auctions.partials.form')
        </form>

    </div>
@endsection