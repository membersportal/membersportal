@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('ContactsController@update', ['id' => $contact->id]) }}">
	{!!csrf_field()!!}
	@include('partials.admin_edit_contact')
	<button type="submit">Save</button>
</form>

@stop