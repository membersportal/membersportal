@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    
  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
    <form method="POST" action="{{ action('RFPController@update', ['id' => $rfp->id]) }}">
    {!!csrf_field()!!}  
    @include('partials.edit_rfp_form')
  <button type="submit">Save</button>
  </div>


  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

  </div>

</div>


@stop
