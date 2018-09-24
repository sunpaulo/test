@extends('layouts.app')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Offers list @endslot
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
                <th class="text-left">Offered by</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td>{{ $offer->product->getName() }}</td>
                    <td>{{ $offer->product->getCreatedAt() }}</td>
                    <td>{{ $offer->seller->name }}</td>
                    <td>{{ $offer->getPrice() }}</td>
                </tr>
            @endforeach
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