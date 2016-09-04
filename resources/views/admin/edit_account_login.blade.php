@extends('layout.master')

@section('content')
<form method="POST" action="{{ action('UsersController@update', [$id = 1]) }}">
	{!!csrf_field()!!}
@include('partials.edit_account_login')
<button type="submit">Submit</button>
</form>
@stop