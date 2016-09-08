@extends ('layouts.master')

@section ('content')

<div class="container">
	<h1 class="text-center space">Manage Users</h1>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
		@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => 'active'] )
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white users">
			<div class="summary">
			<p class="text-center"><span class="strong">Total:</span> {{ $users }} &nbsp;&nbsp;//&nbsp;&nbsp; <span class="strong">Last User Added:</span> {{ $last_user_added->created_at->format('F j Y') }}</p>
			<a href="{{ action('UsersController@create') }}" class="create_button">Create New User</a>
			</div>
			<p class="text-center">To delete a user, search for the record with an email address.</p>
			<form method="GET" action="{{ action('AdminController@deleteUser') }}">
				<div class="form-group">
					<label for="searchField">Email Address</label>
					<input type="email" class="form-control" name="searchField">
				</div>
				<button type="submit" class="btn btn-primary pull-right">Search</button>
			</form>
		</div>
	</div>
</div>

@stop