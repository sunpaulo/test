@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Products list @endslot
            @slot('parent') Main @endslot
            @slot('active') Products @endslot
        @endcomponent

        <hr>

        <a href="{{ route('admin.product.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i> Add product</a>
        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th class="text-right">Action</th>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td class="text-right">
                        <form action="{{ route('admin.product.destroy', $product) }}" onsubmit="if(confirm('Delete?')
                        ) { return true }else{ return false }" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-default">Update</a>

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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
                        {{ $products->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection