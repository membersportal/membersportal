@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
    <ul>
      <li>Manage Login</li>
      <li>Manage Company Information</li>
      <li>Manage Contact Information</li>
    </ul>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

    <form enctype="multipart/form-data" class="" action="{{  }}" method="post">
      {!! csrf_field() !!}
      @include('partials.edit_account_company')

      @include('partials.edit_account_company_images')

    </form>

  </div>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

  </div>
</div>

@stop
