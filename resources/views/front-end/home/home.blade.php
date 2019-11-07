@extends('front-end.master')
@section('title', 'BDshop: Home')
@section('main-content')

<!-- Home slider -->
@include('front-end.includes.home-slider')
<!-- /Home slider -->

<div class="container mt-3">

    <!-- Top Categories 2 -->
    <div class="row gutters-3 mt-3">
        @foreach($categories as $category)
            <div class="col-6 mb-3">
                <div class="card card-2col text-white zoom-hover">
                    <img class="card-img" src="{{ asset($category->image) }}" alt="Card image">
                    <div class="card-img-overlay card-img-overlay-transparent flex-center flex-column">
                        <h2 class="card-title">{{ $category->name }}</h2>
                        <p class="text-center d-none d-lg-block">{!! $category->description !!}</p>
                        <a href="" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /Top Categories 2 -->

    <div class="text-center mt-3">
        <a href="" class="btn btn-light border rounded-pill bold text-muted">ALL CATEGORIES</a>
    </div>

    <!-- Flash deals -->
    <div class="row mt-gutter">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title roboto-condensed bold"><i data-feather="zap" class="align-top"></i> FLASH
                        DEALS: <span class="text-danger" id="flash-deals-countdown">countdown</span></h5>
                    <div class="swiper-container" id="deals-slider">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="card card-2col shadow-none">
                                    <div class="d-flex flex-column-reverse flex-md-row">
                                        <div class="card-2col-body">
                                            <a href="shop-single.html" class="h3 card-title">Legendary Whitetails
                                                Heavyweight Hoodie</a>
                                            <p class="price text-center">
                                                <span class="h4">$44.99</span>
                                                <span class="h5 del">$59.99</span>
                                            </p>
                                            <button type="button" class="btn btn-primary rounded-pill atc-demo"><i
                                                    data-feather="shopping-cart"></i> Add to Cart</button>
                                        </div>
                                        <div class="card-2col-img">
                                            <a href="shop-single.html"
                                                data-cover="{{ asset('assets/front-end/') }}/img/products/flash_deals_1.jpg"
                                                data-xs-height="250px" data-sm-height="200px" data-md-height="175px"
                                                data-lg-height="225px" data-xl-height="250px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="card card-2col shadow-none">
                                    <div class="d-flex flex-column-reverse flex-md-row">
                                        <div class="card-2col-body">
                                            <a href="shop-single.html" class="h3 card-title">Casual Floral Print 3/4
                                                Sleeve Shirt</a>
                                            <p class="price text-center">
                                                <span class="h4">$18.69</span>
                                                <span class="h5 del">$21.99</span>
                                            </p>
                                            <a href="#" class="btn btn-primary rounded-pill atc-demo"><i
                                                    data-feather="shopping-cart"></i> Add to Cart</a>
                                        </div>
                                        <div class="card-2col-img">
                                            <a href="shop-single.html"
                                                data-cover="{{ asset('assets/front-end/') }}/img/products/flash_deals_2.jpg"
                                                data-xs-height="250px" data-sm-height="200px" data-md-height="175px"
                                                data-lg-height="225px" data-xl-height="250px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="card card-2col shadow-none">
                                    <div class="d-flex flex-column-reverse flex-md-row">
                                        <div class="card-2col-body">
                                            <a href="shop-single.html" class="h3 card-title">Legendary Whitetails
                                                Heavyweight Hoodie</a>
                                            <p class="price text-center">
                                                <span class="h4">$44.99</span>
                                                <span class="h5 del">$59.99</span>
                                            </p>
                                            <button type="button" class="btn btn-primary rounded-pill atc-demo"><i
                                                    data-feather="shopping-cart"></i> Add to Cart</button>
                                        </div>
                                        <div class="card-2col-img">
                                            <a href="shop-single.html"
                                                data-cover="{{ asset('assets/front-end/') }}/img/products/flash_deals_1.jpg"
                                                data-xs-height="250px" data-sm-height="200px" data-md-height="175px"
                                                data-lg-height="225px" data-xl-height="250px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="card card-2col shadow-none">
                                    <div class="d-flex flex-column-reverse flex-md-row">
                                        <div class="card-2col-body">
                                            <a href="shop-single.html" class="h3 card-title">Casual Floral Print 3/4
                                                Sleeve Shirt</a>
                                            <p class="price text-center">
                                                <span class="h4">$18.69</span>
                                                <span class="h5 del">$21.99</span>
                                            </p>
                                            <a href="#" class="btn btn-primary rounded-pill atc-demo"><i
                                                    data-feather="shopping-cart"></i> Add to Cart</a>
                                        </div>
                                        <div class="card-2col-img">
                                            <a href="shop-single.html"
                                                data-cover="{{ asset('assets/front-end/') }}/img/products/flash_deals_2.jpg"
                                                data-xs-height="250px" data-sm-height="200px" data-md-height="175px"
                                                data-lg-height="225px" data-xl-height="250px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-prev left-0"><i data-feather="chevron-left"></i></div>
                        <div class="swiper-button-next right-0"><i data-feather="chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Flash deals -->

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
                <div class="price">
                    <span class="h5 del">৳{{ $product->price }}</span>
                    <span class="h5">৳{{ (1-($product->discount/100))*$product->price }}</span>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm rounded-pill btn-outline-primary btn-block atc-demo">Add to Cart</button>
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