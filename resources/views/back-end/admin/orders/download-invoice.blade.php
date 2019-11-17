<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Download Invoice</title>
	<link rel="stylesheet" href="{{ asset('assets/back-end/') }}/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-info text-center">
						<h3>Invoice: {{ $order->id }}</h3>
					</div>
				</div>
			</div>
		</div>
		
		<hr>

		<div class="row">
			<div class="col-md-12">
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
		</div>

		<hr>

		<div class="row">
			<div class="col-md-12">
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
						<td>{{ round($order->order_total) }}</td>
					</tr>
				</table>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-12">
				
				<table class="table table-hover">
					
					<tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Color</th>
						<th>Size</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
				
			
					@foreach($products as $key=>$product)
					<tr>
						<th>{{ $key+1 }}</th>
						<td>{{ $product->product_name }}</td>
						<td>{{ $product->color }}</td>
						<td>{{ $product->size }}</td>
						<td>{{ round($product->product_price) }}</td>
						<td>{{ $product->product_quantity }}</td>
						<td>{{ round($product->product_price*$product->product_quantity) }}</td>
					</tr>
					@endforeach
					
				</table>

			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-hover">
					<tr>
						<th scope="row">Sub Total</th>
						<td>{{ round($order->order_total) }}</td>
					</tr>
					<tr>
						<th scope="row">Sales Tax</th>
						<td>{{ $tax = 0 }}%</td>
					</tr>
					<tr>
						<th scope="row">Grand Total</th>
						<td>{{ round($order->order_total + $tax) }}</td>
					</tr>
				</table>
			</div>
		</div>

	</div>
</body>
</html>
	

