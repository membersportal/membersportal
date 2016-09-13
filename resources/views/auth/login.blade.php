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
			</div>
		</div>
	</div>
	
@stop