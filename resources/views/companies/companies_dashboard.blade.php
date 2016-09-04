@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    <form class="form-control" action="{{ action('RFPController@edit') }}" method="get">
      <label for="users_rfps">My RFPs</label>
      <select class="form-control" id="rfp_id" name="rfp_id">
        <option disabled selected label="Select"></option>
        @foreach ($users_rfps as $rfp)
          <option value="{{ $rfp->id }}">{{ $rfp->project_title }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

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

    <form class="" action="{{ action('EventsController@edit') }}" method="GET">
      <label for="users_events">My Events</label>
      <select class="form-control" id="event_id" name="event_id">
        <option disabled selected label="Select"></option>
        @foreach ($users_events as $event)
          <option value="{{ $event->id }}">{{ $event->title }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>
</div>

@stop
