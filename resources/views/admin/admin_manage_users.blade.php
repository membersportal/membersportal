@extends ('layouts.master')


@section ('content')
<div class="home_panel">
	<div class="panel_green">
		<a class="green_bg" href="{{ action('UsersController@create') }}" alt="Create User">Create New User</a>
	</div>
	<h3 class="text-center">Search Users</h3>
	<form class="navbar-form navbar-left" action="{{ action('UsersController@adminDeleteUser') }}">
		<div class="form-group">
				<input type="email" class="form-control" name="searchField" placeholder="Enter user email address">
		</div>
		<button type="submit" class="btn btn-default">Search</button>
	</form>
</div>

@stop