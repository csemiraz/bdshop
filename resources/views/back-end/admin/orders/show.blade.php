@extends('back-end.master')
@section('title', 'Order Info')
@section('main-content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div>
					<a href="{{ route('orders.index') }}" class="btn btn-info mb-3">
						<i class="fas fa-step-backward"></i> Back
					</a>
				</div>
				<div class="card">
					<div class="card-header text-center text-info">
						<h3>Orders info for this order</h3>
					</div>
					<div class="card-body">
						<table class="table table-hover">
							<tr>
								<th scope="row">Order No</th>
								<td>:</td>
								<td>{{ $order->id }}</td>
							</tr>
							<tr>
								<th scope="row">Order Total</th>
								<td>:</td>
								<td>৳{{ round($order->order_total) }}</td>
							</tr>
							<tr>
								<th scope="row">Order Status</th>
								<td>:</td>
								<td>{{ $order->status }}</td>
							</tr>
							<tr>
								<th scope="row">Order Date</th>
								<td>:</td>
								<td>{{ $order->created_at->toDateString() }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			</div>

			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div class="card">
						<div class="card-header text-center text-info">
							<h3>Customers info for this order</h3>
						</div>
						<div class="card-body">
							<table class="table table-hover">
								<tr>
									<th scope="row">Customer Name</th>
									<td>:</td>
									<td>{{ $customer->first_name.' '.$customer->last_name }}</td>
								</tr>
								<tr>
									<th scope="row">Cusotmer Email</th>
									<td>:</td>
									<td>{{ $customer->email }}</td>
								</tr>
								<tr>
									<th scope="row">Customer Phone</th>
									<td>:</td>
									<td>{{ $customer->phone }}</td>
								</tr>
								<tr>
									<th scope="row">Customer Address</th>
									<td>:</td>
									<td>{{ $customer->address }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div class="card">
						<div class="card-header text-center text-info">
							<h3>Shippings info for this order</h3>
						</div>
						<div class="card-body">
							<table class="table table-hover">
								<tr>
									<th scope="row">Full Name</th>
									<td>:</td>
									<td>{{ $shipping->first_name.' '.$shipping->last_name }}</td>
								</tr>
								<tr>
									<th scope="row">Email Address</th>
									<td>:</td>
									<td>{{ $shipping->email }}</td>
								</tr>
								<tr>
									<th scope="row">Phone Number</th>
									<td>:</td>
									<td>{{ $shipping->phone }}</td>
								</tr>
								<tr>
									<th scope="row">Address</th>
									<td>:</td>
									<td>{{ $shipping->address }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="card">
					<div class="card-header text-center text-info">
						<h3>Products info for this order</h3>
					</div>
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
	</div>

@endsection