@extends('back-end.master')
@section('title', 'Slider: Create')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a href="{{ route('sliders.index') }}" class="btn btn-info mb-3">
                    <i class="fas fa-backward"> Back</i>
                </a>
                
                <div class="card">
                    <div class="card-header text-center"><h3>Slider Info</h3></div>
                    <div class="card-body">
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group row">
                                <label for="" class="col-md-2 col-form-label">Title</label>
                                <div class="col-md-10">
                                    <input name="title" type="text" class="form-control" placeholder="Enter title" value="{{ old('title') }}">                                 
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="" class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <textarea name="description" cols="12" rows="7" placeholder="Enter description">{{ old('description') }}</textarea>                                
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="" class="col-md-2 col-form-label">Link</label>
                                <div class="col-md-10">
                                    <input name="link" type="text" class="form-control" placeholder="Enter route name" value="{{ old('link') }}">                                 
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="" class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input name="image" type="file" class="form-control-file">                                 
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
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" class="btn btn-primary" value="Create Slider">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection