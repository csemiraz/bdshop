@extends('back-end.master')
@section('title')
Category: Manage-Category
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
                <a class="btn btn-primary" href="{{ route('add-category') }}">Add Category</a>
            </div>
            <div class=" card">
                <div class="card-header text-center">
                    Manage Category
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-hover">
                            <thead class=" thead-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key=>$category)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{!! $category->description !!}</td>
                                    <td>
                                        <img src="{{ asset('assets/images/category/'.$category->image) }}" alt="{{ $category->name }}" style="width: 100px; height:100px">
                                    </td>
                                    <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        @if($category->status == 0)
                                        <a href="{{ route('publish-category', ['id'=>$category->id]) }}" title="publish" class="fas fa-arrow-up text-success"></a>
                                        @else
                                        <a href="{{ route('unpublish-category', ['id'=>$category->id]) }}" title="Unpublish" class="fas fa-arrow-down text-warning"></a>
                                        @endif
                                        <a href="{{ route('edit-category', ['id'=>$category->id]) }}" title="edit" class="fas fa-edit text-secondary"></a>
                                        <a href="{{ route('delete-category', ['id'=>$category->id]) }}" title="delete" class="fas fa-trash text-danger"></a>
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