@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('CarouselsController@store') }}">
@include(admin_create_carousel.blade.php)
<button type="submit">Submit</button>
</form>

@stop
