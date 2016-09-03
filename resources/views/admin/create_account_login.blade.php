@extends('layouts.master')
@section('content')

<<<<<<< HEAD
<form method="POST" action="{{ action('AuthController@store') }}">
	{!!csrf_field()!!}
@include(admin_create_login.blade.php)
=======
<form method="POST" action="{{ action('UsersController@store') }}">
	{!!csrf_field()!!}
	@include('partials.admin_create_login')
>>>>>>> ca91b6568c1e46f37bfdf4c47140ffdb40a73247
<button type="submit">Submit</button>
</form>

@stop