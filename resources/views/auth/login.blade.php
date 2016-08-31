<!DOCTYPE html>
<html lang="en">
<head>
	<title>Members Portal</title>
	<link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro" rel="stylesheet">
	<link href="/css/site.css" rel="stylesheet">
</head>
<body id="login">
	<div class="container">
		<div class="login">
			<h3 class="login text-center">Members<strong>Portal</strong></h3>
			<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
				{!! csrf_field() !!}
				@include ('partials.login')
				<button type="submit" class="btn btn-primary pull-right login">Log In</button>
			</form>
			<a class="forgot_password" href="#" alt="Forgot Password">Forgot Password</a>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>