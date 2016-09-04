@extends('layouts.master')

@section('content')
<form action="POST" action="{{ action('UsersController@update', ['id' => Auth::user()->id]) }}">
	{!!csrf_field()!!}
	@include('partials.edit_login_form')
<button type="submit">Save</button>
</form>

@stop
