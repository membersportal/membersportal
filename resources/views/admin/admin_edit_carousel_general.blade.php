@extends ('layouts.master')

@section ('content')

@foreach ($carousels as $carousel) 
<h1><a href="{{ action('CarouselsController@edit', ['id' => $carousel->id]) }} ">{{ $carousel->title }}</a></h1>

@endforeach

@stop