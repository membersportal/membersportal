@extends('layouts.master')

@section('content')

<div class="container">
	
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_form">
			<form action="POST" action="{{ action('UsersController@update', ['id' => Auth::user()->id]) }}">
				{!! csrf_field() !!}
				@include('partials.admin_edit_login_form')
				<button class="btn btn-primary pull-right" type="submit">Save</button>
				<a class="cancel_button pull-right" href="{{ action('UsersController@index') }}" alt="cancel">Cancel</a>
			</form>
		</div>
	</div>
</div>

@stop

