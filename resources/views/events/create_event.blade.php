@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('EventsController@store') }}">
    {!!csrf_field()!!}
    @include('partials.edit_event')
<button type="submit" name="button">Submit</button>
</form>

@stop
