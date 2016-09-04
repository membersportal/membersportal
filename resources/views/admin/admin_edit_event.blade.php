@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('EventsController@update', ['id' => $events->id]) }}">
	@include(events.edit_event)
	<button type="submit">Save</button>
</form>

@stop
