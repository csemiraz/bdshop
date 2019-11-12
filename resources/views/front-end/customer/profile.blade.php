@extends('front-end.master')
@section('title', 'BdShop: Customer Profile')
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
              <a href="javascript:void(0)" class="list-group-item list-group-item-action active"><i data-feather="user" class="mr-3"></i> Profile</a>
              <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action"><i data-feather="shopping-bag" class="mr-3"></i> Orders</a>
              <a href="{{ route('customer.wishlist') }}" class="list-group-item has-badge list-group-item-action"><i data-feather="heart" class="mr-3"></i> Wishlist <span class="badge rounded badge-primary">2</span></a>
              <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action text-danger"><i data-feather="log-out" class="mr-3"></i> Logout</a>
            </div>
          </div>
        </div>

        <div class="col mt-3 mt-md-0">
          <div class="card">
            <div class="card-body">
              <h3>My Profile</h3><hr>
              <form class="form-style-1" action="{{ route('customer.profile-update') }}" method="POST">
              	@csrf
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label for="profileFirstName">First Name</label>
                    <input name="first_name" type="text" class="form-control" id="profileFirstName" value="{{ $customer->first_name }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileLastName">Last Name</label>
                    <input name="last_name" type="text" class="form-control" id="profileLastName" value="{{ $customer->last_name }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileEmail">Email address</label>
                    <input name="email" type="email" class="form-control" id="profileEmail" value="{{ $customer->email }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profilePhone">Phone Number</label>
                    <input name="phone" type="number" class="form-control" id="profilePhone" value="{{ $customer->phone }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileNewPassword">New Password</label>
                    <input name="password" type="password" class="form-control" id="profileNewPassword">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileConfirmPassword">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="profileConfirmPassword">
                  </div>
                  <div class="form-group col-sm-6">
                  	<label for="">Address</label>
                  	<textarea name="address" class="form-control" cols="10" rows="6">{{ $customer->address }}</textarea>
                  </div>
                  <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary">UPDATE PROFILE</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection