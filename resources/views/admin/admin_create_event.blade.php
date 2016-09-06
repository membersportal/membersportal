@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('EventsController@store') }}">
	{!!csrf_field()!!}
	@include ('partials.admin_create_event_form')
</form>

@stop