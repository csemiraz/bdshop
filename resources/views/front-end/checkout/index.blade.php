@extends('front-end.master')
@section('title', 'BdShop: Checkout')
@section('main-content')
<br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card-header bg-white border-bottom flex-center p-0">
                    <ul class="nav nav-pills card-header-pills main-nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">CART</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('checkout.index') }}">CHECKOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('checkout.shipping') }}">SHIPPING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('checkout.payment') }}">PAYMENT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class=" alert alert-info text-center">
                    <h3>You have to login to complete your order. If you you are not registered then please register first.</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4>Register Here</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('checkout.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Pasword">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <textarea name="address" class="form-control" cols="15" rows="5" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-block" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3>Login Here</h3>
                        <h3 class="text-center text-danger">{{ Session::get('message') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('checkout.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Pasword">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-block" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection