@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Categories list @endslot
            @slot('parent') Main @endslot
            @slot('active') Categories @endslot
        @endcomponent

        <hr>

        <a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i> Create category</a>
        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th class="text-right">Action</th>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td class="text-right">
                        <form action="{{ route('admin.category.destroy', $category) }}" onsubmit="if(confirm
                        ('Delete?')) { return true }else{ return false }" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-default">Update</a>

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
                        {{ $categories->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection