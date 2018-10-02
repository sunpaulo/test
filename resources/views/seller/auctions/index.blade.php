@extends('seller.layouts.app')

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
                <th class="text-left">Prices</th>
                <th class="text-center">Status</th>
                <th class="text-right">Update</th>
            </tr>
            </thead>
            <tbody>
            @forelse($auctions as $auction)
                <tr>
                    <td>{{ $auction->product->getName() }}</td>
                    <td>{{ $auction->rates()->orderBy('value')->take(10)->pluck('value')->implode(', ') }}</td>
                    @if ($auction->status === 'in_progress')
                    <td class="text-center">
                        <span class="label label-success">Is available</span>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-success" href="{{route('seller.rate.edit') . "?auction=$auction->id"}}">
                            {{ $auction->myRate }}
                        </a>
                    </td>
                    @else
                        <td class="text-center">
                            <span class="label label-warning">Closed</span>
                        </td>
                        <td class="text-right">
                            <span class="btn btn-warning">Closed</span>
                        </td>
                    @endif
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
                        {{ $auctions->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection