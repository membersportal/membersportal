@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		<div class="home_panel">
			<h3 class="text-center">Navigation</h3>
			<ul>
				<li>
					<a href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Admin Login">Edit My Login</a>
				</li>
				<li>
					<a href="{{ action('ContactsController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Org Contact">Edit Org. Contact</a>
				</li>
				<li>
					<a href="{{ action('UsersController@create') }}" alt="Create New User">Create New User</a>
				</li>
				<li>
					<a href="{{ action('CarouselsController@create') }}" alt="Create New Carousel">Create New Carousel Item</a>
				</li>
				<li>
					<a href="{{ action('EventsController@create') }}" alt="Create New Org Event">Create New Org. Event</a>
				</li>							
			</ul>			
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
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
	</div>
</div>

@stop