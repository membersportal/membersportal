@extends('layouts.master')

@section('content')
<form method="POST" action="{{ action('EventsController@store') }}">
	{!!csrf_field()!!}
	@include('partials.create_event')
<button type="submit">Submit</button>
</form>

@stop
