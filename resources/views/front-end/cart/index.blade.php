@extends('front-end.master')
@section('title', 'BdShop: Cart Info')
@section('main-content')
    <div class="container my-3">
        <div class="card">
            <div class="card-header bg-white border-bottom flex-center p-0">
                <ul class="nav nav-pills card-header-pills main-nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cart.index') }}">CART</a>
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
                        <a class="nav-link" href="{{ route('checkout.payment') }}">PAYMENT</a>
                    </li>
                </ul>
            </div>
            <div class="card-body px-1 px-md-5 pt-5">
                <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
                    <tbody>
                        @foreach($cartInfoes as $cartInfo)
                        <tr>
                            <td class="cart-img nostretch">
                                <a href="{{ route('product-single', ['name'=>$cartInfo->name, 'id'=>$cartInfo->id]) }}"><img src="{{ $cartInfo->attributes->image }}"
                                        alt="{{ $cartInfo->name }}"></a>
                            </td>
                           
                            <td class="cart-title">
                                <a href="{{ route('product-single', ['name'=>$cartInfo->name, 'id'=>$cartInfo->id]) }}" class="h6 bold d-inline-block"
                                    title="Product Name">{{ $cartInfo->name }}</a>
                                
                                @if($cartInfo->attributes->stock==0)
                                <div><i data-feather="x-circle" class="text-danger"></i> Out of Stock</div>
                                @else
                                <div><i data-feather="check-circle" class="text-success"></i> In Stock</div>
                                @endif
    
                                <small class="ml-3"><b>Size</b>: {{ $cartInfo->attributes->size }}</small>
                                <small class="ml-3"><b>Color</b>: {{ $cartInfo->attributes->color }}</small>
    
                            </td>
                            <td class="cart-qty nostretch text-center">
                                <form action="{{ route('cart.update', ['id'=>$cartInfo->id])}}" method="POST">
                                    @csrf
                                    <div class="spinner" data-addclass-on-smdown="spinner-sm">
                                        <button type="submit" class="btn btn-icon rounded-circle"><i data-feather="minus"></i></button>
                                        <input name="quantity" type="number" class="form-control" value="{{ $cartInfo->quantity }}" min="1" max="999">
                                        <button type="submit" class="btn btn-icon rounded-circle"><i data-feather="plus"></i></button>
                                    </div>
                                </form>
                            </td>
                            <td class="cart-price text-right">
                                <span class="roboto-condensed bold">৳{{ $cartInfo->price*$cartInfo->quantity }}</span>
                            </td>
                            <td class="cart-action nostretch pr-0">
                                <div class="dropdown">
                                    <a href="#" class="nav-icon text-secondary dropdown-toggle" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('cart.destroy', ['id'=>$cartInfo->id]) }}">
                                            <button class="dropdown-item text-danger" type="button"><i data-feather="x"></i>
                                                Remove item</button>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <small class="counter">SUBTOTAL</small>
                    <h3 class="roboto-condensed bold">৳{{ Cart::getSubTotal() }}</h3>

                    <?php Session::put('orderTotal', Cart::getSubTotal()); ?>

                    <a href="{{ route('/') }}" class="btn btn-primary rounded-pill btn-lg"><i data-feather="arrow-left"></i> Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary rounded-pill btn-lg">Checkout <i
                            data-feather="arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection