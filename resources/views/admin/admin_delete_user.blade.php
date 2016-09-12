@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Delete User</h1>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
		@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => 'active'] )
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white manage_users">
			<p class="delete_user_warning text-center">Confirm the information below matches that of the user you wish to delete.</p>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<img class="img-thumbnail manage_users center-block" src="{{ '/img/uploads/avatars/' . $searched_user_company->profile_img }}" alt="{{ $searched_user_company->name }}">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
				<h3>Company Name: {{ $searched_user_company->name }}</h3>
				<h4 class="delete_user">Industry: {{ $searched_user_company->industry->industry }}</h4>
				<p class="delete_user">User Email: {{ $searched_user-> email}}</p>
				<p class="delete_user">User Name: {{ $searched_user->first_name . ' ' . $searched_user->last_name }}
			</div>
			<form method="POST" action="{{ action('UsersController@destroy', ['id' => $searched_user_company->id]) }}">
				{!! csrf_field() !!}
				{{ method_field('DELETE') }}
				<button class="btn btn-danger pull-right delete_user" type="submit">Delete</button>
			</form>
			<a class="cancel_button pull-right delete_user" href="{{ action('AdminController@manageUsers') }}" alt="cancel">Cancel</a>
		</div>
	</div>
</div>
@stop