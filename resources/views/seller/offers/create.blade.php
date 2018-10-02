@extends('seller.layouts.app')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Add offer @endslot
            @slot('parent') Main @endslot
            @slot('active') Offers @endslot
        @endcomponent

        <hr>

        <form action="{{ route('seller.offer.store') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}

            {{-- Form include --}}

            @include('seller.offers.partials.form')

            <input type="hidden" name="seller_id" value="{{ Auth::id() }}">
            <input type="hidden" name="product_id" value="{{ $product->getId() }}">
        </form>

    </div>
@endsection