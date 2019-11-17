@extends('back-end.master')
@section('title')
Order: Manage Order
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <button type="button" class="btn btn-primary mb-3">Total Orders: {{ $orders->count() }}</button>
            </div>
            <div class=" card">
                <div class="card-header text-center">
                    Manage Order
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class=" thead-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key=>$order)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $order->customer->first_name.' '.$order->customer->last_name }}</td>
                                    <td>{{ round($order->order_total) }}</td>
                                    <td>                                       
                                      <span class="badge badge-info">{{ $order->status }}</span>
                                    </td>
                                    <td>{{ $order->created_at->toDateString() }}</td>
                                    <td>
                                    	<span class="badge badge-info">{{ $order->payment->type }}</span>
                                    </td>
                                    <td>
                                    	<span class="badge badge-info">{{ $order->payment->status }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('orders.show', ['id'=>$order->id]) }}" title="Product Details" class="badge badge-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('orders.invoice', ['id'=>$order->id]) }}" title="Invoice" class="badge badge-primary">
                                            <i class="fas fa-search-minus"></i>
                                        </a>
                                        <br>
                                        <a href="#" title="Edit" class="badge badge-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" title="delete" class="badge badge-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection