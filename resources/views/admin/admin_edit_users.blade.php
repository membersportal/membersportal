@extends('layouts.master')

@section('content')
<form method="POST" action="{{ action('UsersController@destroy', ['id' => $searched_user_company->id]) }}">
	{!!csrf_field()!!}
	{{ method_field('DELETE') }}
	<h1>{{ $searched_user_company->profile_img}}</h1>
	<h1>Company Name: {{ $searched_user_company->name }}</h1>
	<h3>Industry ID: {{ $searched_user_company->industry_id }}</h3>
	<button type="submit">Submit</button>
</form>
@stop