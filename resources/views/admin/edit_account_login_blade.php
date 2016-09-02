@extends('layout.master')

@section('content')
<form method="POST" action="{{ action('UsersController@update') }}">
@include(admin_create_login.blade.php)
<button type="submit">Submit</button>
</form>
@stop