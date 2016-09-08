@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Manage Users</h1>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
		@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => 'active'] )
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white manage_users">
			<h1>Delete User</h1>
			<p>Please confirm the information below matches the user you wish to delete, then press the delete button.</p>
			<form method="POST" action="{{ action('UsersController@destroy', ['id' => $searched_user_company->id]) }}">
				{!!csrf_field()!!}
				{{ method_field('DELETE') }}
				<h1>{{ $searched_user_company->profile_img }}</h1>
				<h1>Company Name: {{ $searched_user_company->name }}</h1>
				<h3>Industry ID: {{ $searched_user_company->industry_id }}</h3>
				<button type="submit">Delete</button>
			</form>
		</div>
	</div>
</div>
@stop