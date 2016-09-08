@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('CompaniesController@store') }}">
	{!!csrf_field()!!}
	@include('partials.admin_create_company_form')
<button type="submit">Create</button>
</form>

@stop