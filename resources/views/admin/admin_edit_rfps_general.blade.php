@extends ('layouts.master')

@section ('content')

@foreach ($rfps as $rfp) 

<h1><a href="{{ action('RFPController@edit', ['id' => $rfp->id]) }}">{{ $rfp->project_title }}</a></h1>

@endforeach

@stop