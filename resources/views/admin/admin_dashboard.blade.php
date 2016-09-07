@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		<div class="home_panel">
			<h3 class="text-center">Navigation</h3>
				<ul class="admin_dashboard">
					<li>
						<a href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Admin Login">Edit My Login</a>
					</li>
					<li>
						<a href="{{ action('ContactsController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Org Contact">Edit Org. Contact</a>
					<li>
						<a href="{{ action('ArticlesController@adminIndex') }}" alt="Manage Articles">Articles</a>
					</li>
					<li>
						<a href="{{ action('CarouselsController@adminIndex') }}" alt="Manage Carousels">Carousels</a>
					</li>
					<li>
						<a href="{{ action('EventsController@adminIndex') }}" alt="Manage Events">Events</a>
					</li>
					<li>
						<a href="{{ action('RFPController@adminIndex') }}" alt="Manage RFPs">RFPs</a>
					</li>
					<li>
						<a href="{{ action('UsersController@adminIndex') }}" alt="Manage Users">Users</a>
					</li>
				</ul>	
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<!-- Google Analytics stuff -->
	</div>
</div>

@stop