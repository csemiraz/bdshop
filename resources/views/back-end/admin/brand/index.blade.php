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
                        <table class="table table-hover>
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
                                        <a href="{{ route('brands.edit', ['brand'=>$brand->id]) }}" title="edit"
                                            class="fas fa-edit text-secondary"></a>

                                        <a href="{{ route('brands.destroy', ['brand'=>$brand->id]) }}" title="delete" class="fas fa-trash text-danger"
                                            onclick="event.preventDefault(); document.getElementById('form-delete').submit(); "></a>
                                        
                                        <form id="form-delete" action="{{ route('brands.destroy', ['brand'=>$brand->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        <form>
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