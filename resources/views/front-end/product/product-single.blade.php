@extends('front-end.master')
@section('title', 'Product: product-single')
@section('main-content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="swiper-container" id="product-slider">
                            <div class="swiper-wrapper">
                                <img src="{{ asset($productSingle->image) }}" data-large="{{ asset($productSingle->image) }}"
                                    alt="Product" class="swiper-slide">
                                <img src="{{ asset($productSingle->image) }}"
                                    data-large="{{ asset($productSingle->image) }}" alt="Product" class="swiper-slide">
                                <img src="{{ asset($productSingle->image) }}" data-large="{{ asset($productSingle->image) }}"
                                    alt="Product" class="swiper-slide">
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev autohide"><i data-feather="chevron-left"></i></div>
                            <div class="swiper-button-next autohide"><i data-feather="chevron-right"></i></div>
                            <button class="wishlist atw-demo active" title="Added to wishlist"><i
                                    data-feather="heart"></i></button>
                            <button class="zoom" title="Zoom"><i data-feather="zoom-in"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <h3 class="card-title">{{  $productSingle->name }}</h3>
                        <h6><span class="rating" data-value="4.5"></span> <a href="javascript:void(0)">2 reviews</a></h6>
                        <h3 class="price">
                            <span class="del">৳{{  $productSingle->price }}</span>
                            <span>৳{{ (1-($productSingle->discount/100))*$productSingle->price }}</span>
                        </h3>
                        <p class="d-none d-lg-block">{!! Str::limit($productSingle->description, 150) !!}</p>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label class="bold d-block">Size</label>
                                    <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-info active">
                                            <input type="radio" name="size" value="Small" checked> Small
                                        </label>
                                        <label class="btn btn-outline-info">
                                            <input type="radio" name="size" value="Medium"> Medium
                                        </label>
                                        <label class="btn btn-outline-info">
                                            <input type="radio" name="size" value="Large"> Large
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="bold">Color</label>
                                    <div class="color-options justify-content-start">
                                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                                            <input type="radio" name="color" class="custom-control-input" value="Black" checked>
                                            <span class="custom-control-label" style="background-color: #314e76"></span>
                                        </label>
                                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                                            <input type="radio" name="color" class="custom-control-input" value="Orange">
                                            <span class="custom-control-label" style="background-color: #fcab28"></span>
                                        </label>
                                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                                            <input type="radio" name="color" class="custom-control-input" value="Red">
                                            <span class="custom-control-label" style="background-color: #db4524"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label class="bold">Quantity</label>
                                    <div class="w-100 spinner">
                                        <button type="button" class="btn btn-icon rounded-circle"><i
                                                data-feather="minus"></i></button>
                                        <input name="quantity" type="number" class="form-control" value="1" min="1" max="999">
                                        <input type="hidden" name="product_id" class="form-control" value="{{ $productSingle->id }}">
                                        <button type="button" class="btn btn-icon rounded-circle"><i
                                                data-feather="plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group col-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill">Add to
                                        Cart</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="d-flex align-items-center">
                            <span class="text-muted">Share</span>
                            <a href="javascript:void(0)" class="btn btn-light btn-icon rounded-circle border ml-2"
                                data-toggle="tooltip" title="Facebook"><i data-feather="facebook"></i></a>
                            <a href="javascript:void(0)" class="btn btn-light btn-icon rounded-circle border ml-2"
                                data-toggle="tooltip" title="Twitter"><i data-feather="twitter"></i></a>
                            <a href="javascript:void(0)" class="btn btn-light btn-icon rounded-circle border ml-2"
                                data-toggle="tooltip" title="Instagram"><i data-feather="instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header bg-white border-bottom flex-center p-0 mt-3">
                <ul class="nav nav-pills card-header-pills main-nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description" data-toggle="tab" href="#description-content" role="tab"
                            aria-controls="description-content" aria-selected="true">DESCRIPTION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reviews" data-toggle="tab" href="#review-content" role="tab"
                            aria-controls="review-content" aria-selected="false">REVIEWS (2)</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="card-body tab-pane fade show active" id="description-content" role="tabpanel"
                    aria-labelledby="description">
                    {!! $productSingle->description !!}
                </div>
                <div class="card-body tab-pane fade" id="review-content" role="tabpanel" aria-labelledby="reviews">
                    <div class="row gutters-3 justify-content-center">
                        <div class="col-11 col-sm-6 col-md-4 col-lg-3">
                            <h5 class="bold roboto-condensed rating">
                                OVERALL RATING: 4.5
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 32 32">
                                    <title>star-full</title>
                                    <path
                                        d="M32 12.408l-11.056-1.607-4.944-10.018-4.944 10.018-11.056 1.607 8 7.798-1.889 11.011 9.889-5.199 9.889 5.199-1.889-11.011 8-7.798z">
                                    </path>
                                </svg>
                            </h5>
                            <div class="list-group">
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="5"></span> <span>1 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="4"></span> <span>1 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="3"></span> <span>0 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="2"></span> <span>0 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="1"></span> <span>0 review <i
                                            data-feather="chevron-right"></i></span></a>
                            </div>
                            <div class="text-center mt-1">
                                <button class="btn btn-primary btn-block rounded-pill" data-toggle="modal"
                                    data-target="#reviewModal">Write a review</button>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9 mt-5 mt-md-0">
                            <div class="media">
                                <a href="javascript:void(0)"><img src="../img/user/user1.svg" alt="User" width="45"
                                        height="45" class="rounded-circle"></a>
                                <div class="media-body ml-2 ml-sm-3">
                                    <h6 class="bold">Terrific Shirt, Exactly What I Wanted.</h6>
                                    <p class="d-flex flex-wrap">
                                        <span class="rating mr-2" data-value="5"></span>
                                        <a href="javascript:void(0)" class="mr-2">Alan Lewis</a>
                                        <span class="text-muted">3 days ago</span>
                                    </p>
                                    <p>The Hanes sweatshirt was precisely what I wanted except for the color which is better
                                        than what I thought I was getting. This order went perfectly, so much so that
                                        another two are being shipped to me right now. It is way too early to say anything
                                        about durability; but otherwise, there is no way this order could have gone any
                                        better than it did. If you are interested in a pretty traditional long-sleeve
                                        sweatshirt, you would do well to give this one serious consideration.</p>
                                    <hr>
                                </div>
                            </div>
                            <div class="media">
                                <a href="javascript:void(0)"><img src="../img/user/user2.svg" alt="User" width="45"
                                        height="45" class="rounded-circle"></a>
                                <div class="media-body ml-2 ml-sm-3">
                                    <h6 class="bold">Very comfortable.</h6>
                                    <p class="d-flex flex-wrap">
                                        <span class="rating mr-2" data-value="4"></span>
                                        <a href="javascript:void(0)" class="mr-2">Amy</a>
                                        <span class="text-muted">5 days ago</span>
                                    </p>
                                    <p>Fits slightly larger than expected, but gets longer, not just wider. (For reference,
                                        I am female, 5'8'', 170lbs, and this sweatshirt fits around my 36J chest with room
                                        to spare, coming to rest at about crotch level)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Related Products -->
        <h4 class="bold text-center mt-gutter">Related Products</h4>
        <div class="card-deck card-deck-product mt-3 mb-2 mb-sm-0">
            <div class="card card-product">
                <div class="card-body">
                    <button class="wishlist atw-demo active" title="Added to wishlist"><i data-feather="heart"></i></button>
                    <a href="shop-single.html"><img class="card-img-top" src="../img/products/1_small.jpg"
                            alt="Card image cap"></a>
                    <a href="shop-single.html" class="card-title">Hanes Hooded Sweatshirt</a>
                    <span class="badge badge-success">New arrival</span>
                    <div class="price"><span class="h5">$18.56</span></div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm rounded-pill btn-outline-primary btn-block atc-demo">Add to Cart</button>
                </div>
            </div>
            <div class="card card-product">
                <div class="card-body">
                    <button class="wishlist atw-demo" title="Add to wishlist"><i data-feather="heart"></i></button>
                    <a href="shop-single.html"><img class="card-img-top" src="../img/products/2_small.jpg"
                            alt="Card image cap"></a>
                    <a href="shop-single.html" class="card-title">The Flash Logo T-Shirt</a>
                    <div class="price">
                        <span class="h5">$16.64</span>
                    </div>
                    <div class="color-options">
                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                            <input type="radio" name="color-option1" class="custom-control-input"
                                value="../img/products/2_small.jpg" checked>
                            <span class="custom-control-label" style="background-color: #f2c43a"></span>
                        </label>
                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                            <input type="radio" name="color-option1" class="custom-control-input"
                                value="../img/products/2_small_black.jpg">
                            <span class="custom-control-label" style="background-color: #23232b"></span>
                        </label>
                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                            <input type="radio" name="color-option1" class="custom-control-input"
                                value="../img/products/2_small_red.jpg">
                            <span class="custom-control-label" style="background-color: #eb0015"></span>
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm rounded-pill btn-outline-primary btn-block atc-demo">Add to Cart</button>
                </div>
            </div>
            <div class="card card-product">
                <div class="card-body">
                    <button class="wishlist atw-demo" title="Add to wishlist"><i data-feather="heart"></i></button>
                    <a href="shop-single.html"><img class="card-img-top" src="../img/products/3_small.jpg"
                            alt="Card image cap"></a>
                    <a href="shop-single.html" class="card-title">Open Front Cropped Cardigans</a>
                    <span class="badge badge-warning">20% OFF</span>
                    <div class="price">
                        <span class="h5 del">$19.00</span>
                        <span class="h5">$15.20</span>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm rounded-pill btn-outline-primary btn-block atc-demo">Add to Cart</button>
                </div>
            </div>
            <div class="card card-product">
                <div class="card-body">
                    <button class="wishlist atw-demo" title="Add to wishlist"><i data-feather="heart"></i></button>
                    <a href="shop-single.html"><img class="card-img-top" src="../img/products/4_small.jpg"
                            alt="Card image cap"></a>
                    <a href="shop-single.html" class="card-title">Cotton Fleece Long Hoodie</a>
                    <div class="price">
                        <span class="h5 del">$98.90</span>
                        <span class="h5">$85.00</span>
                    </div>
                    <div class="color-options">
                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                            <input type="radio" name="color-option2" class="custom-control-input"
                                value="../img/products/4_small.jpg" checked>
                            <span class="custom-control-label" style="background-color: #625e39"></span>
                        </label>
                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                            <input type="radio" name="color-option2" class="custom-control-input"
                                value="../img/products/4_small_blue.jpg">
                            <span class="custom-control-label" style="background-color: #2e4797"></span>
                        </label>
                        <label class="custom-control custom-radio custom-radio-color custom-control-inline">
                            <input type="radio" name="color-option2" class="custom-control-input"
                                value="../img/products/4_small_maroon.jpg">
                            <span class="custom-control-label" style="background-color: #791949"></span>
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm rounded-pill btn-outline-primary btn-block atc-demo">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- /Related Products -->
    
    </div>
@endsection