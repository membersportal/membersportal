@extends('layouts.master')

@section('content')
<form action="POST" action="{{ action('UsersController@update', [$id = 1]) }}">
	{!!csrf_field()!!}
	@include('partials.edit_account_login')
<button type="submit">Submit</button>
</form>

@stop