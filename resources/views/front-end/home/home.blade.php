@extends('front-end.master')
@section('title', 'BdShop: Home')
@section('main-content')

<!-- Home slider -->
@include('front-end.includes.home-slider')
<!-- /Home slider -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="bold text-center mt-gutter">Categories</h4>
        </div>
    </div>
</div>
<div class="container mt-3">

    <!-- Top Categories -->
    <div class="row gutters-3 mt-3">
        @foreach($homeCategories as $homeCategory)
            <div class="col-md-3 col-6 mb-3">
                <div class="card card-2col text-white zoom-hover">
                    <img class="card-img" src="{{ asset($homeCategory->image) }}" alt="Card image">
                    <div class="card-img-overlay card-img-overlay-transparent flex-center flex-column">
                        <h2 class="card-title">{{ $homeCategory->name }}</h2>
                        <p class="text-center d-none d-lg-block">{!! $homeCategory->description !!}</p>
                        <a href="{{ route('product.category', ['name'=>$homeCategory->name]) }}" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /Top Categories -->

    <div class="text-center mt-3">
        <a href="{{ route('category.allCategory') }}" class="btn btn-light border rounded-pill bold text-muted">ALL CATEGORIES</a>
    </div>

   <!-- /All Brands -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header bg-white border-bottom bold roboto-condensed">
                    <h5 class="bold mb-0">POPULAR <span class="text-primary">BRANDS</span></h5>
                </div>
                <div class="card-body">
                    <div class="btn-group-scatter">
                        @foreach($brands as $brand)
                        <a href="{{ route('product.brand', ['name'=>$brand->name]) }}" class="btn btn-light rounded-pill">{{  $brand->name }} <span class="text-primary"> ({{ $brand->products()->count() }})</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /All Brands -->

   
    <h4 class="bold text-center mt-gutter">Products</h4>

    <!-- Featured Products -->
            
    <div class="card-deck card-deck-product mt-3 mb-2 mb-sm-0">
        @foreach($products as $product)
        <div class="card card-product">
            <div class="card-body">
                <button class="wishlist atw-demo" title="Add to wishlist"><i data-feather="heart"></i></button>
                <a href="{{ route('product-single', ['id'=>$product->id, 'name'=>$product->name]) }}"><img class="card-img-top"
                        src="{{ asset($product->image) }}" alt="Card image cap"></a>
                <a href="{{ route('product-single', ['id'=>$product->id, 'name'=>$product->name]) }}" class="card-title">{{ $product->name }}</a>
                <span class="badge badge-warning">{{ $product->discount }}% OFF</span>
                @if($product->stock<1)
                <span class="float-right"><i data-feather="x-circle" class="text-danger"></i> Out of Stock</span>
                @endif
                <div class="price">
                    <span class="h5 del">৳{{ $product->price }}</span>
                    <span class="h5">৳{{ (1-($product->discount/100))*$product->price }}</span>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input name="product_id" type="hidden" value="{{ $product->id }}">
                    @if($product->stock==0)
                    <button title="Out of stock" class="btn btn-sm rounded-pill btn-outline-primary btn-block disabled">Add to Cart</button>
                    @else
                    <button class="btn btn-sm rounded-pill btn-outline-primary btn-block">Add to Cart</button>
                    @endif
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /Featured Products -->

    <!-- / Products Pagination -->
    <div class="row">
        <div class="col-md-12 "> 
            {{ $products->links() }}
        </div>
    </div>
    <!-- / Products Pagination-->
</div>

@endsection