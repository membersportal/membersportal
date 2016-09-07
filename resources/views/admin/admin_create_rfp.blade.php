@extends('layouts.master')

@section('content')

<form class="" action="{{ action('RFPController@store') }}" method="post" enctype="multipart/form-data">
  {!! csrf_field() !!}
  @include('partials.admin_create_rfp_form')

<button type="submit" class="btn btn-default">Create</button>

</form>

@stop
