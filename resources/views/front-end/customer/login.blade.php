@extends('front-end.master')
@section('title', 'BdShop: Customer Login')
@section('main-content')
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						<h3>Login <span class="float-right" style="font-size: 15px">New member? <a href="{{ route('customer.registerForm') }}">Register</a> here</span></h3>
						
					</div>
					<div class="card-body">
						<form action="{{ route('customer.login') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="" class="col-form-label">Email address</label>
								<input name="email" type="email" class="form-control rounded" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Password</label>
								<input name="password" type="password" class="form-control rounded" placeholder="Enter password">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary btn-block rounded" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
@endsection