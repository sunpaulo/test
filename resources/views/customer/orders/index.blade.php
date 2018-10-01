@extends('customer.layouts.app')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Orders list @endslot
            @slot('parent') Main @endslot
            @slot('active') Orders @endslot
        @endcomponent

        <hr>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Product name</th>
                <th class="text-left">Price</th>
                <th class="text-center">Seller's contacts</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->product->getName() }}</td>
                    <td class="text-left">{{ $order->getPrice() }}</td>
                    <td class="text-center">{{ $order->seller->getEmail() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <h2>No data</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $orders->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection