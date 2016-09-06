@extends('layouts.master')

@section('content')

<div class="container">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
		@include('partials.edit_account_nav')
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<form action="POST" action="{{ action('UsersController@update', ['id' => Auth::user()->id]) }}">
			{!! csrf_field() !!}
			@include('partials.edit_login_form')
			<button type="submit">Save</button>
		</form>
	</div>
</div>

@stop
