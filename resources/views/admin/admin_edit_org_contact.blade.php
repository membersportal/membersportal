@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center">Edit Org. Contact Information</h1>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
		<ul class="edit_account_nav">
			<li><a href="{{ action('UsersController@getAdminDashboard') }}" alt="Analytics">Analytics</a></li>
			<li><a href="{{ action('UsersController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Admin Login">Edit My Login</a></li>
			<li><a class="active" href="{{ action('ContactsController@edit', ['id' => Auth::user()->id]) }}" alt="Edit Org Contact">Edit Org. Contact</a></li>
			<li><a href="{{ action('ArticlesController@adminIndex') }}" alt="Manage Articles">Articles</a></li>
			<li><a href="{{ action('CarouselsController@adminIndex') }}" alt="Manage Carousels">Carousels</a></li>
			<li><a href="{{ action('EventsController@adminIndex') }}" alt="Manage Events">Events</a></li>
			<li><a href="{{ action('RFPController@adminIndex') }}" alt="Manage RFPs">RFPs</a></li>
			<li><a href="{{ action('UsersController@adminIndex') }}" alt="Manage Users">Users</a></li>
		</ul>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_form">
			<form method="POST" action="{{ action('ContactsController@update', ['id' => $contact->id]) }}">
				{!!csrf_field()!!}
				@include('partials.admin_edit_contact')
				<button type="submit">Save</button>
			</form>
		</div>
	</div>
</div>

@stop