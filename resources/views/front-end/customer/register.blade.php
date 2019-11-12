@extends('front-end.master')
@section('title', 'BdShop: Customer Register')
@section('main-content')
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						<h3>Register <span class="float-right" style="font-size: 15px">Already member? <a href="{{ route('customer.loginForm') }}">Login</a> here</span></h3>
						
					</div>
					<div class="card-body">
						<form action="{{ route('customer.register') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="" class="col-form-label">First Name</label>
								<input name="first_name" type="text" class="form-control rounded" placeholder="Enter first name">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Last Name</label>
								<input name="last_name" type="text" class="form-control rounded" placeholder="Enter last name">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Email address</label>
								<input name="email" type="email" class="form-control rounded" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Password</label>
								<input name="password" type="password" class="form-control rounded" placeholder="Enter password">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Phone</label>
								<input name="phone" type="number" class="form-control rounded" placeholder="Enter phone number">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Address</label>
								<textarea name="address" class="form-control rounded" cols="15" rows="7" placeholder="Enter Address"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary btn-block rounded" value="Register">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
@endsection