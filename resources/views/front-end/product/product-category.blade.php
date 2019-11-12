@extends('front-end.master')
@section('title', 'BdShop: Product By Category')
@section('main-content')
    <!-- Main Content -->
    <div class="container mt-3 mb-3">
        <div class="row gutters-3">
    
            <!-- Shop Filters -->
            <div class="col-lg-3 col-md-4">
                <div class="accordion accordion-caret accordion-sidebar d-none d-md-block">
                    <div class="card">
                        <div class="card-header">
                            <a href="#filter-categories" data-toggle="collapse" aria-expanded="true"
                                aria-controls="filter-categories" role="button" class="h6">
                                CATEGORIES
                            </a>
                        </div>
                        <div id="filter-categories" class="collapse show">
                            <div class="card-body">
                                <ul class="list-tree">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('product.category', ['name'=>$category->name]) }}">{{ $category->name }} <small class="counter">({{ $category->products()->count() }})</small></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="#filter-price" data-toggle="collapse" aria-expanded="true" aria-controls="filter-price"
                                role="button" class="h6">
                                PRICE
                            </a>
                        </div>
                        <div id="filter-price" class="collapse show">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <input type="text"
                                        class="form-control form-control-sm rounded-pill text-center bold roboto-condensed bg-light mr-2 minw-0"
                                        id="price-slider-min">
                                    <input type="text"
                                        class="form-control form-control-sm rounded-pill text-center bold roboto-condensed bg-light ml-2 minw-0"
                                        id="price-slider-max">
                                </div>
                                <div id="price-slider"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="#filter-size" data-toggle="collapse" aria-expanded="true" aria-controls="filter-size"
                                role="button" class="h6">
                                SIZE
                            </a>
                        </div>
                        <div id="filter-size" class="collapse show">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="size-small">
                                    <label class="custom-control-label" for="size-small">Small</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="size-medium" checked>
                                    <label class="custom-control-label" for="size-medium">Medium</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="size-large" checked>
                                    <label class="custom-control-label" for="size-large">Large</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="size-extra-large">
                                    <label class="custom-control-label" for="size-extra-large">Extra Large</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="#filter-colors" data-toggle="collapse" aria-expanded="true"
                                aria-controls="filter-colors" role="button" class="h6">
                                COLORS
                            </a>
                        </div>
                        <div id="filter-colors" class="collapse show">
                            <div class="card-body">
                                <div class="color-options">
                                    <label class="custom-control custom-checkbox custom-radio-color custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" checked>
                                        <span class="custom-control-label" style="background-color: #606ddd"></span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-radio-color custom-control-inline">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label" style="background-color: #4caf50"></span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-radio-color custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" checked>
                                        <span class="custom-control-label" style="background-color: #17a2b8"></span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-radio-color custom-control-inline">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label" style="background-color: #ffc107"></span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-radio-color custom-control-inline">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label" style="background-color: #f44336"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <a href="#filter-brands" data-toggle="collapse" aria-expanded="true" aria-controls="filter-brands"
                                role="button" class="h6">
                                BRANDS
                            </a>
                        </div>
                        <div id="filter-brands" class="collapse show">
                            <div class="card-body">
                                <ul class="list-tree">
                                    @foreach($brands as $brand)
                                    <li><a href="{{ route('product.brand', ['name'=>$brand->name]) }}">{{ $brand->name }} <small
                                                class="counter">({{ $brand->products()->count() }})</small></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Shop Filters -->
    
            <div class="col-lg-9 col-md-8">
    
                <!-- Shop Toolbar -->
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-end align-items-center py-2">
                        <button class="btn btn-sm btn-outline-primary rounded-pill d-block d-md-none mr-auto"
                            data-toggle="modal" data-target="#filterModal"><i data-feather="filter"></i> Filter</button>
                        <ol class="breadcrumb d-none d-md-flex p-0 mb-0 mr-auto">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.allCategory') }}">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $categoryName->name }}</li>
                        </ol>
                    </div>
                </div>
                <!-- /Shop Toolbar -->
    
                <!-- Product By Category -->
                <div class="card-deck card-deck-product with-sidebar mt-3">
                    @foreach($productCategories as $product)
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
                <!-- /Product By Category -->

                <!-- Pagination -->
                <div>
                    {{ $productCategories->links() }}
                </div>
    
            </div>
        </div>
    </div>
    <!-- /Main Content -->
    
    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">Shop Filters</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                </div>
            </div>
        </div>
    </div>
    <!-- /Filter Modal -->
@endsection