@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('CarouselsController@update', ['id' => $carousel->id]) }}">
	{!! csrf_field() !!}
	@include('partials.admin_edit_carousel_form')
<button type="submit">Save</button><a href="{{ action('CarouselsController@destroy', ['id' => $carousel->id]) }}">Delete</a>
</form>

@stop