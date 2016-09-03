@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		<div class="home_panel">
			<h3 class="text-center">Navigation</h3>
			<ul>
				<li>
					<a href="{{ action('UsersController@edit', [$id = 1]) }}" alt="Manage Admin Login">Manage Admin Login</a>
				</li>
				<li>
					<a href="{{ action('CompaniesController@edit', [$id = 1]) }}" alt="Manage Admin Company">Manage Admin Company</a>
				</li>
				<li>
					<a href="{{ action('ContactsController@edit', [$id = 1]) }}" alt="Manage Admin Contact">Manage Admin Contact</a>
				</li>
				<li>
					<a href="{{ action('UsersController@create') }}" alt="Create User">Create User</a>
				</li>
				<li>
					<a href="{{ action('CarouselsController@create') }}" alt="Add Carousel">Add Carousel</a>
				</li>
				<li>
					<a href="{{ action('EventsController@create') }}" alt="Add Event">Add Event</a>
				</li>							
			</ul>			
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<div class="home_panel">
			<h3 class="text-center">Manage Users</h3>
			<div>
				<form class="navbar-form navbar-left" action="{{ action('UsersController@editUsers') }}">
					<div class="form-group">
		 				<input type="text" class="form-control" name="searchField" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
	  			</form>
			</div>
		</div>
	</div>
</div>

@stop