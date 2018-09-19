@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Edit category @endslot
            @slot('parent') Main @endslot
            @slot('active') Categories @endslot
        @endcomponent

        <hr>

        <form action="{{ route('admin.category.update', $category) }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('put') }}

            {{-- Form include --}}

            @include('admin.categories.partials.form')
        </form>

    </div>
@endsection