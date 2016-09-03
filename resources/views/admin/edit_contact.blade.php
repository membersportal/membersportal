@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('AuthController@store') }}">
	{!!csrf_field()!!}
@include(edit_account_contact.blade.php)
<button type="submit">Submit</button>
</form>

@stop