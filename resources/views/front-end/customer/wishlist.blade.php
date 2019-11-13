@extends('front-end.master')
@section('title', 'BdShop: Customer Wishlist')
@section('main-content')
	<div class="container my-3">
      <div class="row">

        <div class="col-md-4 col-lg-3">
          <div class="card">
            <div class="card-body text-center">
              <img src="{{  asset('assets/images/default/user.png') }}" width="100" height="100" alt="User" class="rounded-circle mb-3">
              <h5 class="bold mb-0">{{ $customer->first_name.' '.$customer->last_name }}</h5>
              <small class="counter">Joined {{ $customer->created_at->toFormattedDateString() }}</small>
              <hr>
              <div class="roboto-condensed bold" data-toggle="tooltip" title="You currently have 1,113 Points to spend.">
                <i data-feather="award" class="text-warning"></i> Points: 1113</div>
            </div>
            <div class="list-group list-group-flush">
              <a href="{{ route('customer.profile') }}" class="list-group-item list-group-item-action"><i data-feather="user" class="mr-3"></i> Profile</a>
              <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action"><i data-feather="shopping-bag" class="mr-3"></i> Orders</a>
              <a href="javascript:void(0)" class="list-group-item has-badge list-group-item-action active"><i data-feather="heart" class="mr-3"></i> Wishlist <span class="badge rounded badge-primary">{{ $wishLists->count() }}</span></a>
              <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action text-danger"><i data-feather="log-out" class="mr-3"></i> Logout</a>
            </div>
          </div>
        </div>

        <div class="col mt-3 mt-md-0">
          <div class="card">
            <div class="card-body">
              <h3>My Wishlist <span class="badge badge-primary rounded">{{ $wishLists->count() }}</span></h3><hr>
              @foreach($wishLists as $wishList)
              <div class="card card-product card-product-list shadow-none border-bottom">
                <a href="{{ route('product-single', ['id'=>$wishList->id, 'name'=>$wishList->name]) }}"><img class="card-img-top" src="{{ asset($wishList->image) }}" alt="Card image cap"></a>
                <div class="card-body d-flex flex-column justify-content-center">
                  <a href="{{ route('product-single', ['id'=>$wishList->id, 'name'=>$wishList->name]) }}" class="card-title">{{ $wishList->name }}</a>
                  <div class="attr">
                    <div class="price mr-3"><span class="h5">৳{{ $wishList->price }}</span></div>
                    @if($wishList->stock!=0)
                    <div><i data-feather="check-circle" class="text-success"></i> In Stock</div>
                    @else
                    <div><i data-feather="check-circle" class="text-danger"></i> Out of Stock</div>
                    @endif
                  </div>

                  <p class="d-flex justify-content-between align-items-center">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input name="product_id" type="hidden" value="{{ $wishList->id }}">
                        @if($wishList->stock==0)
                        <button class="btn rounded-pill btn-outline-primary" data-addclass-on-xs="btn-sm" disabled>Add to Cart</button>
                        @else
                        <button class="btn rounded-pill btn-outline-primary" data-addclass-on-xs="btn-sm">Add to Cart</button>
                        @endif
                    </form>
                    <a href="{{ route('customer.wishlistRemove', ['id'=>$wishList->id]) }}">
                      <button class="float-right btn btn-link btn-icon d-inline-flex text-danger" data-addclass-on-xs="btn-sm" data-toggle="tooltip" title="Remove item"><i data-feather="x"></i></button>
                    </a>
                    
                  </p>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection