@extends('back-end.master')
@section('title')
Slider: Manage Slider
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('sliders.create') }}">Add Slider</a>
            </div>
            <div>
                <button type="button" class="badge badge-secondary mb-3">Total Sliders: {{ $sliders->count() }}</button>
            </div>
            <div class=" card">
                <div class="card-header text-center">
                    Manage Slider
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class=" thead-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $key=>$slider)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ Str::limit($slider->title, 10) }}</td>
                                    <td>{!! Str::limit($slider->description, 20) !!}</td>
                                    <td>{{ $slider->link }}</td>
                                    <td>
                                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" style="width: 100px; height:100px">
                                    </td>
                                    <td>
                                        @if($slider->status==1)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-info">Unpublished</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('sliders.edit', ['slider'=>$slider->id]) }}" title="edit" class="badge badge-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" title="delete" class="badge badge-danger" onclick="deleteData({{ $slider->id }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-data-{{ $slider->id }}" action="{{ route('sliders.destroy', ['slider'=>$slider->id]) }}" method="POST" style="display: none;">
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