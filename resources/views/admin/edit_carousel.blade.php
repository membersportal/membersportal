@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('CarouselsController@update, $carousels->id)">
@include(admin_create_carousel.blade.php)
<button type="submit">Submit</button>
</form>

@stop