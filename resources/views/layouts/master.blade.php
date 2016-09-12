<!DOCTYPE html>
<html lang="en">
<head>
	<title>Members Portal</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/css/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro" rel="stylesheet">
	<link href="/css/site.css" rel="stylesheet">
	<link href="/css/navbar.css" rel="stylesheet">
	<link href="/css/carousel.css" rel="stylesheet">
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
					<li class="active triangle"><a href="{{ action('RFPController@index') }}">Requests for Proposals <span class="sr-only">RFPs</span></a></li>
					<li class="active triangle"><a href="{{ action('EventsController@index') }}">Events <span class="sr-only">Events</span></a></li>
					<li class="active triangle"><a href="{{ action('ArticlesController@index') }}">Articles <span class="sr-only">Articles</span></a></li>
					<li class="triangle"><a href="{{ action('CompaniesController@searchMembers') }}">Search Members</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							@if (Auth::user()->is_admin)
								<li><a href="{{ action('AdminController@index') }}">Admin Dashboard</a></li>
							@endif
							@if (!Auth::user()->is_admin)
								<li><a href="{{ action('CompaniesController@show', ['id' => Auth::user()->id]) }}">View Profile</a></li>
								<li><a href="{{ action('CompaniesController@dashboard', ['id' => Auth::user()->id]) }}">My Dashboard</a></li>
								<li><a href="{{ action('CompaniesController@viewConnections', ['id' => Auth::user()->id]) }}">My Connections</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}">My Account</a></li>
							@endif
							<li><a href="{{ action('Auth\AuthController@getLogout') }}">Log Out</a></li>
						</ul>
					<li><img src="{{ '/img/uploads/avatars/' . Auth::user()->company->profile_img }}" class="user_avatar img-circle"></li>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	@endif
	@include('partials.session_alerts')
	<div class="expand">
		@yield('content')
	</div>
	@if (Auth::check())
		@include('partials.footer')
	@endif

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap/bootstrap.min.js"></script>
	@yield('bottom-script')
</body>
</html>
