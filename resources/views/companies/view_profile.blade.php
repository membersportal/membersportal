@extends('layouts.master')

@section('content')
<form method="POST" action="{{ action('ConnectionsController@store', ['id' => $company->id]) }}">
	{!! csrf_field() !!}
	<button type="submit" class="btn btn-primary">Connect</button>
</form>

@stop