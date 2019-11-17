@extends('back-end.master')
@section('title', 'Order Invoice')
@section('main-content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div>
					<a href="{{ route('orders.index') }}" class="btn btn-info mb-3">
						<i class="fas fa-step-backward"></i> Back
					</a>
				</div>
				
				<div class="card">
					<div class="card-header bg-info text-center">
						<h3>Invoice: {{ $order->id }}</h3>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h3>Shipping information</h3>
				<ul>
					<li>{{ $shipping->first_name.' '.$shipping->last_name }}</li>
					<li>{{ $shipping->phone }}</li>
					<li>{{ $shipping->address }}</li>
				</ul>

				<h3>Billing information</h3>
				<ul>
					<li>{{ $customer->first_name.' '.$customer->last_name }}</li>
					<li>{{ $customer->phone }}</li>
					<li>{{ $customer->address }}</li>
				</ul>
			</div>
			<div class="col-md-6">
				<table class="table table-striped">
					<tr>
						<th scope="row">Issue Date</th>
						<td>{{ $order->created_at->toDateString() }}</td>
					</tr>
					<tr>
						<th scope="row">Due Date</th>
						<td>{{ $order->updated_at->toDateString() }}</td>
					</tr>
					<tr>
						<th scope="row">Amount Due</th>
						<td>৳{{ round($order->order_total) }}</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body table-responsive">
						<table class="table table-hover">
							<thead class="bg-light">
								<tr>
									<th>SL</th>
									<th>Product Id</th>
									<th>Product Name</th>
									<th>Product Color</th>
									<th>Product Size</th>
									<th>Product Price</th>
									<th>Product Quantity</th>
									<th>Total Price</th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $key=>$product)
								<tr>
									<th scope="row">{{ $key+1 }}</th>
									<th scope="row">{{ $product->product_id }}</th>
									<td>{{ $product->product_name }}</td>
									<td>{{ $product->color }}</td>
									<td>{{ $product->size }}</td>
									<td>{{ $product->product_price }}</td>
									<td>{{ $product->product_quantity }}</td>
									<td>৳{{ round($product->product_price*$product->product_quantity) }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 offset-md-6">
				<table class="table table-striped table-hover">
					<tr>
						<th scope="row">Sub Total</th>
						<td>৳{{ round($order->order_total) }}</td>
					</tr>
					<tr>
						<th scope="row">Sales Tax</th>
						<td>{{ $tax = 0 }}%</td>
					</tr>
					<tr>
						<th scope="row">Grand Total</th>
						<td>৳{{ round($order->order_total + $tax) }}</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div>
					<a href="{{ route('orders.download-invoice', ['id'=>$order->id]) }}" class="btn btn-success mb-3">
						<i class="fas fa-download"></i> Download Invoice
					</a>
				</div>
			</div>
		</div>

	</div>

@endsection