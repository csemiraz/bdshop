@extends('front-end.master')
@section('title', 'BdShop: Category')
@section('main-content')
    <div class="container my-3">
        <!-- All Category -->
        <div class="row categories-grid gutters-3">
            @foreach($allCategories as $allCategory)
            <div class="col-md-3 col-6 mt-3 mt-sm-0 mb-3">
                <a href="{{ route('product.category', ['name'=>$allCategory->name]) }}">
                    <div class="card zoom-hover">
                        <div data-cover="{{ asset($allCategory->image) }}" data-xs-height="100px" data-sm-height="128px"
                            data-md-height="115px" data-lg-height="154px" data-xl-height="192px"></div>
                        <div class="card-img-overlay card-img-overlay-transparent">
                            <h3 class="card-title text-center">{{ $allCategory->name }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!-- /All Category -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ $allCategories->links() }}
            </div>
        </div>
    </div>
@endsection