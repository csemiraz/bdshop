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
                        <h6><span class="rating" data-value="{{ $reviews->count()!=0 ? $reviews->sum('rating')/$reviews->count() : 0 }}"></span> <a href="javascript:void(0)">{{ $reviews->count() }} reviews</a></h6>
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
                                    @if($productSingle->stock==0)
                                    <button title="Out of stock" type="submit" disabled class="btn btn-primary btn-block rounded-pill">Add to
                                        Cart</button>
                                    @else
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill">Add to
                                        Cart</button>
                                    @endif
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
                            aria-controls="review-content" aria-selected="false">REVIEWS ({{ $productSingle->reviews()->count() }})</a>
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
                                OVERALL RATING: {{ $reviews->count()!=0 ? round($reviews->sum('rating')/$reviews->count(), 2) : 'No Review Yet ' }}
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
                                        class="rating" data-value="5"></span> <span>5 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="4"></span> <span>4 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="3"></span> <span>3 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="2"></span> <span>2 review <i
                                            data-feather="chevron-right"></i></span></a>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action text-muted d-flex justify-content-between"><span
                                        class="rating" data-value="1"></span> <span>1 review <i
                                            data-feather="chevron-right"></i></span></a>
                            </div>
                            <div class="text-center mt-1">
                                @if(Session::get('customerId'))
                                <button class="btn btn-primary btn-block rounded-pill" data-toggle="modal"
                                    data-target="#reviewModal">Write a review</button>
                                @else
                                <button class="btn btn-primary btn-block rounded-pill" 
                                    onclick="toastr.info('You have to login or registered first to review', 'info', {
                                        closeButton: true,
                                        progressBar: true,
                                    })"
                                >Write a review</button>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9 mt-5 mt-md-0">
                            @foreach($reviews as $review)
                            <div class="media">
                                <a href="javascript:void(0)"><img src="{{ asset('assets/images/default/user.png') }}" alt="User" width="45"
                                        height="45" class="rounded-circle"></a>
                                <div class="media-body ml-2 ml-sm-3"> 
                                    <p class="d-flex flex-wrap">
                                        <span class="rating mr-2" data-value="{{ $review->rating }}"></span>
                                        <a href="javascript:void(0)" class="mr-2">{{ $review->customer->first_name.' '.$review->customer->last_name }}</a>
                                        <span class="text-muted">{{ $review->created_at->diffForHumans() }}</span>
                                    </p>
                                    <p>{!! $review->review !!}</p>
                                    <hr>
                                </div>
                            </div>
                            @endforeach
                            <div>
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Related Products -->
        <h4 class="bold text-center mt-gutter">Related Products</h4>
        <div class="card-deck card-deck-product mt-3 mb-2 mb-sm-0">
            @foreach($productRelated as $product)
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
        <!-- /Related Products -->
    </div>

    <!-- Add review modal -->
  
    <div class="modal fade" tabindex="-1" role="dialog" id="reviewModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title">Write a review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form action="{{ route('customer.review') }}" method="POST" class="form-style-1">
                        @csrf
                        <div class="form-group">
                            <input name="product_id" type="hidden" value="{{ $productSingle->id }}" class="form-control bg-white" id="reviewName">
                        </div>
                        <div class="form-group">
                            <label for="reviewRating">Rating</label>
                            <select name="rating" class="form-control bg-white custom-select" id="reviewRating">
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reviewText">Review</label>
                            <textarea name="review" class="form-control bg-white" id="reviewText" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn rounded-pill btn-primary">Submit review</button>
                        </div>
                    </form>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn rounded-pill btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
   
    <!-- /Add review modal -->
@endsection