@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="text-center row">
                    <div class="col-md-6">
                        <h3>Sellers</h3>
                        @forelse(\App\Models\Seller::all() as $seller)
                            <p>{{$seller->email}}</p>
                        @empty
                            <p>No sellers</p>
                        @endforelse
                    </div>
                    <div class="col-md-6">
                        <h3>Customers</h3>
                        @forelse(\App\Models\Customer::all() as $customer)
                            <p>{{$customer->email}}</p>
                        @empty
                            <p>No customers</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
