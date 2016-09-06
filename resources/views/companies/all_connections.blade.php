@extends('layouts.master')

@section('content')

@foreach($connections as $connection)
  <img src="{{ '/img/uploads/avatars/' . $connection->profile_img }} " alt="" />
  <a href="{{ action('CompaniesController@show', $id = $connection->id) }}"> {{ $connection->name }}</a>

@endforeach

@stop
