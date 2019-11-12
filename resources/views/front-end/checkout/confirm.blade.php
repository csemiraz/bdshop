@extends('front-end.master')
@section('title', 'BdShop: Confirm Checkout')
@section('main-content')
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center py-3">
                    <i data-feather="check-circle" class="text-success" width="48" height="48"></i>
                    <h1>Thank you.</h1>
                    <p>Your order has been placed and will be processed as soon as possible.</p>
                    <p class="mb-0">
                        <span class="text-muted">Order ID:</span>
                        <span class="text-info">#P00{{ Session::get('orderId') }}</span>
                    </p>
                    <p>
                        <span class="text-muted">Amount: </span>
                        <span class="text-info">৳{{ Session::get('totalOrder') }}</span>
                    </p>
                    <p>A confirmation email has been sent to <u>user@example.com</u></p>
                    <a href="{{ route('/') }}" class="btn btn-secondary rounded mb-3">CONTINUE SHOPPING</a>
                    <a href="{{ route('customer.order') }}" class="btn btn-primary rounded mb-3">VIEW ORDER</a>
                </div>
            </div>
        </div>
    </div>
@endsection