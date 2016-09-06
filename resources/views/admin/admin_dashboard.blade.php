@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		<div class="home_panel">
			<h3 class="text-center">Navigation</h3>
				
				<li>
					<a href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Admin Login">Edit My Login</a>
				</li>
				<li>
					<a href="{{ action('ContactsController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Org Contact">Edit Org. Contact</a>
				</li>
				<ul>
					<p>Users</p>
					<li>
						<a href="{{ action('UsersController@create') }}" alt="Create New User">Create New User</a>
					</li>
				</ul>
				<ul>
					<p>Companies</p>
					<li>
						<a href="{{ action('CompaniesController@create') }}" alt="Create New Company">Create New Company</a>
					</li>
					<li>
						<a href="{{ action('CompaniesController@edit') }}" alt="Edit Company">Edit Company</a>
					</li>
				</ul>
				<ul>
					<p>Carousels</p>
					<li>
						<a href="{{ action('CarouselsController@create') }}" alt="Create New Carousel">Create New Carousel Item</a>
					</li>
					<li>
						<a href="{{ action('CarouselsController@edit') }}" alt="Edit Carousel">Edit Carousel Item</a>
					</li>
				</ul>
				<ul>
					<p>Org Event</p>
					<li>
						<a href="{{ action('EventsController@create') }}" alt="Create New Org Event">Create New Org. Event</a>
					</li>
					<li>
						<a href="{{ action('EventsController@edit') }}" alt="Edit Org Event">Edit Org. Event</a>
					</li>
				</ul>
				<ul>
					<p>RFPs</p>
					<li>
						<a href="{{ action('RFPController@create') }}" alt="Create New RFP">Create New RFP</a>
					</li>
					<li>
						<a href="{{ action('RFPController@edit') }}" alt="Edit RFP">Edit RFP</a>
					</li>
				</ul>
				<ul>
					<p>Articles</p>
					<li>
						<a href="{{ action('ArticlesController@create') }}" alt="Create New Article">Create New Article</a>
					</li>
					<li>
						<a href="{{ action('ArticlesController@edit') }}" alt="Edit Article">Edit Article</a>
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