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
              <a href="javascript:void(0)" class="list-group-item has-badge list-group-item-action active"><i data-feather="heart" class="mr-3"></i> Wishlist <span class="badge rounded badge-primary">2</span></a>
              <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action text-danger"><i data-feather="log-out" class="mr-3"></i> Logout</a>
            </div>
          </div>
        </div>

        <div class="col mt-3 mt-md-0">
          <div class="card">
            <div class="card-body">
              <h3>My Wishlist</h3><hr>
              
              <div class="card card-product card-product-list shadow-none border-bottom">
                <a href="shop-single.html"><img class="card-img-top" src="../img/products/1_small.jpg" alt="Card image cap"></a>
                <div class="card-body d-flex flex-column justify-content-center">
                  <a href="shop-single.html" class="card-title">Hanes Hooded Sweatshirt</a>
                  <div class="attr">
                    <div class="price mr-3"><span class="h5">$18.56</span></div>
                    <div><i data-feather="check-circle" class="text-success"></i> In Stock</div>
                  </div>
                  <p class="d-flex justify-content-between align-items-center">
                    <button class="btn rounded-pill btn-outline-primary atc-demo" data-addclass-on-xs="btn-sm">Add to Cart</button>
                    <button class="btn btn-link btn-icon d-inline-flex text-danger" data-addclass-on-xs="btn-sm" data-toggle="tooltip" title="Remove item"><i data-feather="x"></i></button>
                  </p>
                </div>
              </div>
              
              <div class="card card-product card-product-list shadow-none border-bottom">
                <a href="shop-single.html"><img class="card-img-top" src="../img/products/8_small.jpg" alt="Card image cap"></a>
                <div class="card-body d-flex flex-column justify-content-center">
                  <a href="shop-single.html" class="card-title">Slim-Fit Short-Sleeve Printed Shirt</a>
                  <div class="attr">
                    <div class="price mr-3"><span class="h5">$25.00</span></div>
                    <div><i data-feather="x-circle" class="text-danger"></i> Out of Stock</div>
                  </div>
                  <p class="d-flex justify-content-between align-items-center">
                    <button class="btn rounded-pill btn-outline-primary atc-demo" data-addclass-on-xs="btn-sm" disabled>Add to Cart</button>
                    <button class="btn btn-link btn-icon d-inline-flex text-danger" data-addclass-on-xs="btn-sm" data-toggle="tooltip" title="Remove item"><i data-feather="x"></i></button>
                  </p>
                </div>
              </div>
              
              <div class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" id="informCheck" checked>
                <label class="custom-control-label" for="informCheck">Inform me when item from my wishlist is available</label>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection