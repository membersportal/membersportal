@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
    @include('partials.manage_account_nav')
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

    <form class="" action="{{ action('ContactsController@update', [$id = $contact->id]) }}" method="post">
      {!! csrf_field() !!}
      @include('partials.edit_account_contact')

      <button type="submit" class="btn btn-default">Update</button>
    </form>

  </div>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

  </div>
</div>

@stop
