@extends('front-end.master')
@section('title', 'BdShop: Payment')
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
                            <a class="nav-link" href="{{ route('checkout.shipping') }}">SHIPPING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="javascript:void(0)"><i data-feather="arrow-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('checkout.payment') }}">PAYMENT</a>
                        </li>
                    </ul>
                </div>
            </div>
       </div>
   </div>
   <div class="row mt-3">
       <div class="col-md-12">
           <div class="alert alert-info text-center">
               <h3>Dear <span class="badge badge-success">{{ Session::get('customerFirstName').' '.Session::get('customerLastName') }}.</span> Please choose your payment method.</h3>
           </div>
       </div>
   </div>

   <div class="row">
       <div class="col-md-12">
           <form action="{{ route('checkout.order') }}" method="POST">
               @csrf
               <table class="table table-bordered">
                <tr>
                    <th>Cash On Delivery</th>
                    <td>
                        <input type="radio" name="type" value="Cash" checked> Cash On Delivery
                    </td>
                </tr>
                <tr>
                    <th>bKash</th>
                    <td>
                        <input type="radio" name="type" value="bKash"> bKash
                    </td>
                </tr>
                <tr>
                    <th>Paypal</th>
                    <td>
                        <input type="radio" name="type" value="Paypal"> Paypal
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" name="btn" class="btn btn-info" value="Confirm Order">
                    </td>
                </tr>
            </table>
           </form>
       </div>
   </div>
</div>
@endsection