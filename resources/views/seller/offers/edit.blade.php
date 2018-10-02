@extends('seller.layouts.app')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Edit offer @endslot
            @slot('parent') Main @endslot
            @slot('active') Offers @endslot
        @endcomponent

        <hr>

        <form action="{{ route('seller.offer.update', $offer) }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            {{-- Form include --}}

            @include('seller.offers.partials.form')

        </form>

    </div>
@endsection