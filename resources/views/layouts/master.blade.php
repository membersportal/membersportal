<!DOCTYPE html>
<html lang="en">
<head>
	<title>Members Portal</title>
	<link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro" rel="stylesheet">
	<link href="/css/site.css" rel="stylesheet">
</head>
<body>
	@if (Auth::check())
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ action('UsersController@index') }}">Members<span class="brand">Portal</span></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ action('EventsController@index') }}">Events <span class="sr-only">Events</span></a></li>
					<li><a href="{{ action('UsersController@searchMembers') }}">Search Members</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (!Auth::check())
					<li><a href="{{ action('Auth\AuthController@getLogin') }}">Log In</a></li>
					@else
					<img src="http://placekitten.com/35/35" class="user_avatar">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="{{ action('UsersController@show', ['id' => Auth::user()->id]) }}">View Profile</a></li>
						<li><a href="{{ action('UsersController@dashboard', ['id' => Auth::user()->id]) }}">My Dashboard</a></li>
						<li><a href="{{ action('UsersController@viewConnections', ['id' => Auth::user()->id]) }}">My Connections</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{ action('UsersController@editAccountLogin', ['id' => Auth::user()->id]) }}">My Account</a></li>
						</ul>
					</li>
					@endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	@endif
	<div class="container">
		@yield('content')
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>