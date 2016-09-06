@extends('layouts.master')

@section('content')

<form enctype="multipart/form-data" class="" action="{{ action('RFPController@store') }}" method="post">
  {!! csrf_field() !!}
  @include('partials.create_rfp_form')

<button type="submit" class="btn btn-default">Create</button>
 
</form>  

@stop
