@extends('layouts.master')

@section('content')

<div class="container">
<div class="row">
  <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-xl-6 col-xs-offset-3">
    <h1>The page you have requested does not exist.</h1>
    <h4>Return Home <a href="{{ action('UsersController@index') }}">here</a>.</h4>
  </div>
</div>
</div>

@stop
