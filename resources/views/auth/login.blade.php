@extends('layouts.master')
@section('content')
	<div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
		<div class="center-block login">
			<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
				{!! csrf_field() !!}
				@include ('partials.login')
				<a class="forgot_password" href="#" alt="Forgot Password">Forgot Password</a>
				<button type="submit" class="btn btn-primary pull-right">Log In</button>
			</form>
		</div>
	</div>
@stop