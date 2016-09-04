@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('ContactsController@store') }}">
	{!!csrf_field()!!}
	@include(edit_contact_form)
	<button type="submit">Save</button>
</form>

@stop