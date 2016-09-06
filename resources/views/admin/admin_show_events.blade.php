@extends ('layouts.master')

@section ('content')

@foreach ($events as $event)
<h1><a href="{{ action('EventsController@edit', ['request' => $event->id]) }}">{{ $event->title }}</a></h1>

@endforeach


@stop