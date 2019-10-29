@extends('back-end.master')
@section('title')
Brand: Manage-Brand
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('brands.create') }}">Add Brand</a>
            </div>
            <div class=" card">
                <div class="card-header text-center">
                    Manage Brand
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-hover">
                            <thead class=" thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $key=>$brand)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->description }}</td>
                                    <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        @if($brand->status == 0)
                                        <a href="{{ route('brands.publish', ['brand'=>$brand->id]) }}" title="publish"
                                            class="fas fa-arrow-up text-success"></a>
                                        @else
                                        <a href="{{ route('brands.unpublish', ['brand'=>$brand->id]) }}"
                                            title="Unpublish" class="fas fa-arrow-down text-warning"></a>
                                        @endif
                                        <a href="{{ route('brands.edit', $brand->id) }}" title="edit"
                                            class="fas fa-edit text-secondary"></a>

                                        <a href="#" class="badge badge-danger" title="delete" onclick="deleteData({{ $brand->id }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-data-{{ $brand->id }}" action="{{ route('brands.destroy', $brand->id) }}"
                                            method="POST" style="display:none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection