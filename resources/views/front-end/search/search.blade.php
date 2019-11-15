@extends('front-end.master')
@section('title', 'BdShop: Search')
@section('main-content')


	<div class="container mt-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h3>Searching for: <span class="text-primary">{{ $query }}</span></h3>
					<h3>Searching results: <span class="badge badge-primary rounded">{{ $products->count() }}</span></h3>
				</div>
			</div>
		</div>
	</div>
	</div>


	<!-- Searching Products -->
	<div class="container">
	    <div class="card-deck card-deck-product mt-3 mb-2 mb-sm-0">
	        @foreach($products as $product)
	        <div class="card card-product">
	            <div class="card-body">

	                <?php
	                    $customer = App\Customer::find(Session::get('customerId')); 
	                ?>
	                @if(isset($customer) && $customer->wishListProducts()->where('product_id', $product->id)->count()>0)
	                <a href="javascript:void(0)" onclick="document.getElementById('customer-wishlist-{{ $product->id }}').submit(); ">
	                    <button class="wishlist active" title="Add to wishlist"><i data-feather="heart"></i></button>
	                </a>
	                @else
	                <a href="javascript:void(0)" onclick="document.getElementById('customer-wishlist-{{ $product->id }}').submit(); ">
	                    <button class="wishlist" title="Add to wishlist"><i data-feather="heart"></i></button>
	                </a>
	                @endif
	                
	                <form id="customer-wishlist-{{ $product->id }}" action="{{ route('customer.wishlistStore', ['id'=>$product->id]) }}" method="POST" style="display: none">
	                    @csrf
	                </form>
	               
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
		</div>
		<!-- /Searching Products -->


	


@endsection