@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
    <form action="#" method="get">
      <label for="submitted_rfps">My Submitted RFPs</label>
      <select class="form-control" id="submited_rfps" name="submitted_rfps">
        <option disabled selected label="Select"></option>



      </select>
      <a href="{{ action('RFPController@create') }}">Create New Request</a>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>
  </div>

  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

    <form enctype="multipart/form-data" class="" action="{{ action('RFPController@store') }}" method="post">
      {!! csrf_field() !!}
      @include('partials.create_rfp')

      <button type="submit" class="btn btn-default">Create</button>
      </form>
  </div>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
    <form class="" action="{{ action('EventsController@edit') }}" method="get">
      <label for="users_events">My Events</label>
      <select class="form-control" id="event_id" name="event_id">
        <option disabled selected label="Select"></option>
        @foreach ($users_events as $event)
          <option value="{!! $event->id !!}">{{ $event->title }}</option>
        @endforeach
      </select>
      <a href="{{ action('EventsController@create') }}">Add new event</a>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>


    <div class="panel_white">
      <h3 class="text-center">Connection Events</h3>
      @foreach ($connections_events as $key => $event)
        @if ($key < 3)
        <div id="accordion" role="tablist" aria-multiselectable="false">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading{{$key+1}}">
              <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $event->title }}
              </a>
              </h4>
              <p class="event_date_home">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</p>
            </div>
            <div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
            {{ str_limit($event->desc, 100) }}<a class="red_link" href="{{ $event->url }}" target="_blank"> see event</a>
            </div>
          </div>
        </div>
        @endif
      @endforeach
      <div class="panel_green">
        <a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
      </div>
    </div>
  </div>
</div>

@stop
