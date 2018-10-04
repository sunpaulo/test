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
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($auctions as $auction)
                <tr>
                    <td>{{ $auction->product->getName() }}</td>
                    <td>{{ $auction->rates()->orderBy('value')->take(10)->pluck('value')->implode(', ') }}</td>
                    <td class="text-right">
                    @if ($auction->status === 'in_progress')
                        <a class="btn btn-success" href="{{route('seller.rate.edit') . "?auction=$auction->id"}}">
                            {{ $auction->myRate }}
                        </a>
                    @else
                        <form action="{{ route('seller.auction.update', $auction) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <input type="submit" value="Save" class="btn btn-primary">
                        </form>
                    @endif
                    </td>
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
                        {{ $auctions->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection