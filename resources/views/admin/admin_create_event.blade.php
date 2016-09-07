@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('EventsController@store') }}" enctype="multipart/form-data">
	{!!csrf_field()!!}
	@include ('partials.admin_create_event_form')
	<button type="submit">Create Event</button>
</form>

@stop
