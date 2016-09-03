@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('EventsController@store') }}">
	{!!csrf_field()!!}
@include(create.event.blade.php)
<button type="submit">Submit</button>
</form>

@stop
