@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Edit product @endslot
            @slot('parent') Main @endslot
            @slot('active') Products @endslot
        @endcomponent

        <hr>

            <form action="{{ route('admin.product.update', $product) }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('put') }}

            {{-- Form include --}}
            @include('admin.products.partials.form')

            <input type="hidden" name="moderator_id" value="{{ Auth::id() }}">
        </form>

    </div>
@endsection