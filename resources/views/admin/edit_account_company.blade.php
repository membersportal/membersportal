@extends('layout.master')

@section('content')
<form method="POST" action="{{ action('CompaniesController@update', [$id = 1]) }}">
	{!!csrf_field)()!!}
	@include('partials.edit_account_company')
<button type="submit">Submit</button>

@stop