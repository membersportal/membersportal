@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('UsersController@store') }}">
	{!! csrf_field() !!}
	@include('partials.admin_create_user_form')
	<button type="submit">Continue</button>
</form>

@stop
