@extends('front-end.master')
@section('title', 'BdShop: Customer Orders')
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
              
              <a href="javascript:void(0)" class="list-group-item has-badge list-group-item-action active"><i data-feather="shopping-bag" class="mr-3"></i> Orders <span class="badge rounded badge-primary">{{ $orders->count() }}</span></a>
              <a href="{{ route('customer.wishlist') }}" class="list-group-item has-badge list-group-item-action"><i data-feather="heart" class="mr-3"></i> Wishlist <span class="badge rounded badge-primary"></span></a>
              <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action text-danger"><i data-feather="log-out" class="mr-3"></i> Logout</a>
            </div>
          </div>
        </div>

       <div class="col mt-3 mt-md-0">
          <div class="card">
            <div class="card-body">
              <h3>My Orders <span class="badge rounded badge-primary">{{ $orders->count() }}</span></h3><hr>
              <div class="table-responsive">
                <table class="table table-hover" data-addclass-on-xs="table-sm">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Date</th>
                      <th scope="col" class="text-right">Total</th>
                      <th scope="col" class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <th scope="row"><a href="javascript:void(0)">{{ $order->id }}</a></th>
                      <td>{{ $order->created_at->toFormattedDateString() }}</td>
                      <td class="text-right">৳{{ round($order->order_total) }}</td>
                      <td class="text-center"><span class="badge badge-warning rounded">{{ $order->status }}</span></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @if($orders->count()!=0)
              <a href="{{ route('customer.excel') }}">
                <button class="btn btn-outline-success rounded-pill btn-sm"><i data-feather="file-text"></i> Download as xls</button>
              </a>
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection