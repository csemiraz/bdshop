@extends('front-end.master')
@section('title', 'BdShop: Shipping')
@section('main-content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white border-bottom flex-center p-0">
                        <ul class="nav nav-pills card-header-pills main-nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">CART</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('checkout.index') }}">CHECKOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('checkout.shipping') }}">SHIPPING</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('checkout.payment') }}">PAYMENT</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pt-5 flex-center flex-column">
                        <form class="form-checkout form-style-1" action="{{ route('checkout.shipping.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="shippingFirstName">First Name</label>
                                    <input name="first_name" type="text" class="form-control" id="shippingFirstName"
                                        value="{{ $customer->first_name }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="shippingLastName">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" id="shippingLastName"
                                        value="{{ $customer->last_name }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="shippingEmail">Email</label>
                                    <input name="email" type="email" class="form-control" id="shippingEmail"
                                        value="{{ $customer->email }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="shippingPhone">Phone Number</label>
                                    <input name="phone" type="tel" class="form-control" id="shippingPhone"
                                        value="{{ $customer->phone }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="shippingAddress">Address</label>
                                    <textarea name="address" class="form-control" rows="7" cols="10">{{ $customer->address }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary rounded-pill btn-lg">Payment <i
                                        data-feather="arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection