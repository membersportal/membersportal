@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">



  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
    @foreach($feed_content as $content)
      @if($content->company1_id)
        <h1>{{ $content->company1_id }}</h1>
      @elseif($content->project_title)
        <h2>{{ $content->project_title }}
      @elseif($content->title)
        <h3>{{ $content->title }}</h3>
      @endif
    @endforeach

  </div>


  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

    

  </div>
</div>

@stop
