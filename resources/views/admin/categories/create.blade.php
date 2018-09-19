@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Category creation @endslot
            @slot('parent') Main @endslot
            @slot('active') Categories @endslot
        @endcomponent

        <hr>

        <form action="{{ route('admin.category.store') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}

            {{-- Form include --}}

            @include('admin.categories.partials.form')
        </form>

    </div>
@endsection