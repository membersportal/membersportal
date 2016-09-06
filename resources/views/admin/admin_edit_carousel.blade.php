@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('CarouselsController@update', ['id' => $carousels->id]) }}">
	{!! csrf_field() !!}
	@include('partials.admin_edit_carousel_form')
<button type="submit">Save</button>
</form>

@stop