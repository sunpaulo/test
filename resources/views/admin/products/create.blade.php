@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Product creation @endslot
            @slot('parent') Main @endslot
            @slot('active') Products @endslot
        @endcomponent

        <hr>

        <form action="{{ route('admin.product.store') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.products.partials.form')

            <input type="hidden" name="creator_id" value="{{ Auth::id() }}">
        </form>

    </div>
@endsection