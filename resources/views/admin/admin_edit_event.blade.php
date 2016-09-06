@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('EventsController@update', ['id' => $event->id]) }}">
	@include('partials.edit_event_form')
	<button type="submit">Save</button>
</form>

@stop
