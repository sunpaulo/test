@extends('customer.layouts.app')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Create order @endslot
            @slot('parent') Main @endslot
            @slot('active') Orders @endslot
        @endcomponent

        <hr>

        <form action="{{ route('customer.order.store') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}

            @include('customer.orders.partials.form')
        </form>
    </div>

@endsection