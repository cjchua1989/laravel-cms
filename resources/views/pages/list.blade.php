@extends('layout.dashboard')

@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Manage Pages</h1> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Pages</h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success" role="success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12 text-right">
                <a href="/dashboard/pages/create" class="btn btn-success">Create Page</a>   
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-respone">
                    <table class="table table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="400">Name</th>
                                <th>Description</th>
                                <th width="200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="/dashboard/pages/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <a href="/dashboard/pages/{{ $item->id }}/delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    No page found, please create a page.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 text-right">
                            {{ $pages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection