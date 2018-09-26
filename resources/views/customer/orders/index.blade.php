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
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->offer->product->getName() }}</td>
                    <td class="text-left">{{ $order->offer->getPrice() }}</td>
                    <td class="text-center">{{ $order->offer->seller->getEmail() }}</td>
                    <td class="text-right">
                        <form action="{{ route('customer.order.destroy', $order) }}"
                              onsubmit="if(confirm('Are you sure?')) { return true }else{ return false }" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button type="submit" class="btn btn-danger">Unsubscribe</button>
                        </form>
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
                        {{ $orders->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection