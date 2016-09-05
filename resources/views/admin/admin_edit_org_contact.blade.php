@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('ContactsController@update', ['id' => $contacts->id]) }}">
	{!!csrf_field()!!}
	@include(partials.admin_edit_contact_form)
	<button type="submit">Save</button>
</form>

@stop