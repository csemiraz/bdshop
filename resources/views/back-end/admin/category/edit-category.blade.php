@extends('back-end.master')
@section('title', 'Category: Edit-Category')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a href="{{ route('manage-category') }}" class="btn btn-info mb-3">
                    <i class="fas fa-backward"> Back</i>
                </a>
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center"><h3>Category Info</h3></div>
                    <div class="card-body">
                        <form action="{{ route('update-category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group row">
                                <label for="" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" class="form-control" placeholder="Category Name" value="{{ $category->name }}">
                                    <input name="category_id" type="text" class="form-control" value="{{ $category->id }}">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Category Description...">{{ $category->description }}</textarea>
                                    <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input name="image" type="file" class=" form-control-file">
                                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select name="status" class="form-control">
                                        <option value="" disabled>Publication Status</option>
                                        <option value="1" {{ $category->status==1 ? 'selected' : ' '}}>Publish</option>
                                        <option value="0" {{ $category->status==0 ? 'selected' : ' '}}>UnPublish</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" class="btn btn-primary" value="Update Category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection