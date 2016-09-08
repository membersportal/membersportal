@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('CarouselsController@store') }}" enctype="multipart/form-data">
	{!!csrf_field()!!}
	@include('partials.admin_create_carousel_form')
<button type="submit">Create</button>
</form>

@stop
