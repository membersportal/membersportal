@extends ('layouts.master')

@section ('content')
<div class="container">
	<h1 class="text-center space">Manage Users</h1>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
		@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => 'active'] )
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_form"> 
			<p class="text-center">To delete a user, search for the record with an email address.</p>
				<form method="GET" action="{{ action('UsersController@adminDeleteUser') }}">
					<div class="form-group">
						<label for="searchField">Email Address</label>
						<input type="email" class="form-control" name="searchField">
					</div>
					<button type="submit" class="btn btn-primary pull-right">Search</button>
				</form>
		</div>
		<div class="panel_form">
			<div class="panel_green">
				<a class="green_bg" href="{{ action('UsersController@create') }}" alt="Create User">Create New User</a>
			</div>
		</div>
	</div>
</div>

@stop