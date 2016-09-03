@extends('layouts.master')

@section('content')
<form method="POST" action="UsersController@destroy, $searchedUserCompany->id">
	{!!csrf_field()!!}
<h1>{{ $searchedUserCompany->profile_img}}</h1>
<h1>Company Name: {{ $searchedUserCompany->name }}</h1>
<h3>Industry ID: {{ $searchedUserCompany->industry_id }}</h3>
<button type="submit">Submit</button>
</form>
@stop