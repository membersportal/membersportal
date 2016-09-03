@extends('layout.master')

@section('content')
<form method="POST" action="{{ action('UsersController@update') }}">
@include('partials.admin_create_login')
<button type="submit">Submit</button>
</form>
@stop