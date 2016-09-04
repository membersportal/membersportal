@extends('layouts.master')

@section('content')
	<div id="login">
		<div class="container">
			<div class="login">
				<h3 class="login text-center">Members<strong>Portal</strong></h3>
				<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
					{!! csrf_field() !!}
					@include ('partials.login')
					<button type="submit" class="btn btn-primary pull-right login">Log In</button>
				</form>
				<a class="text-center forgot_password" href="#" alt="Forgot Password">Forgot Password</a>
			</div>
		</div>
	</div>
	
@stop