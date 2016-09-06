@extends ('layouts.master')


@section ('content')
<div class="home_panel">
			<h3 class="text-center">Delete User</h3>
			<div>
				<form class="navbar-form navbar-left" action="{{ action('UsersController@adminDeleteUser') }}">
					<div class="form-group">
		 				<input type="email" class="form-control" name="searchField" placeholder="Enter user email address">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
	  		</form>
			</div>
		</div>

@stop