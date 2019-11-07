@extends('back-end.master')
@section('title', 'Brand: Add-Brand')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="{{ route('brands.index') }}" class="btn btn-info mb-3">
                <i class="fas fa-backward"> Back</i>
            </a>
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header text-center">
                    <h3>Brand Info</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('brands.store') }}" method="POST">
                        @csrf
                      
                        <div class=" form-group row">
                            <label for="" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input name="name" type="text" class="form-control" placeholder="Brand Name"
                                    value="{{ old('name') }}">
                                <span
                                    class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="mytextarea" name="description" class="form-control" cols="30" rows="10"
                                    placeholder="Brand Description...">{{ old('description') }}</textarea>
                                <span
                                    class="text-danger">{{ $errors->has('description') ? $errors->first('description') : ''}}</span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                                <select name="status" class="form-control">
                                    <option value="" disabled>Publication Status</option>
                                    <option value="1">Publish</option>
                                    <option value="0">UnPublish</option>
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 offset-md-2">
                                <input type="submit" class="btn btn-primary" value="Create Brand">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection