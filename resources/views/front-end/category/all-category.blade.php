@extends('front-end.master')
@section('title', 'BdShop: All Category')
@section('main-content')

	<div class="container">
		<div class="row gutters-3 mt-3">
        	@foreach($allCategories as $category)
            <div class="col-md-3 col-6 mb-3">
                <div class="card card-2col text-white zoom-hover">
                    <img class="card-img" src="{{ asset($category->image) }}" alt="Card image">
                    <div class="card-img-overlay card-img-overlay-transparent flex-center flex-column">
                        <h2 class="card-title">{{ $category->name }}</h2>
                        <p class="text-center d-none d-lg-block">{!! $category->description !!}</p>
                        <a href="{{ route('product.category', ['name'=>$category->name]) }}" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        	@endforeach
    	</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				{{ $allCategories->links() }}
			</div>
		</div>
	</div>

@endsection