@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('UsersController@store') }}">
	{!!csrf_field()!!}
	@include('partials.admin_create_login')
<button type="submit">Submit</button>
</form>

@stop
