@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('EventsController@update', $events->id) }}">
@include(create.event.blade.php)
<button type="submit">Submit</button>
</form>

@stop
