@extends('account_layout')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 main">
				<div class="row">
					<div class="col-sm-6 left-side">
						<h1>Image<br>2<br>Text.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique justo eget nibh convallis pharetra.</p>
						<br>
						<p>Don't have an account? Create your account, it takes less than a minute</p>
						<a class="fb" href="{{ route('register') }}">Create a Account</a>
					</div><!--col-sm-6-->
					<div class="col-sm-6 right-side">
						<h1>Login</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<!--Form with header-->
						<div class="form">
							<form method="post" action="{{ route('checkLogin') }}">
								@csrf
								<div class="form-group">
									<label for="form2">Your email</label>
									<input type="text" id="email" name="email" class="form-control">
		    					</div>
						        <div class="form-group">
								    <label for="form4">Your password</label>
						            <input type="password" id="password" name="password" class="form-control">
						        </div>
						        <div class="text-xs-center">
						            <button type="submit" class="btn btn-deep-purple">Login</button>
						        </div>
							</form>
						</div>
						<!--/Form with header-->
					</div><!--col-sm-6-->
				</div>
			</div><!--col-sm-8-->
		</div>
	</div><!--container-->
@endsection