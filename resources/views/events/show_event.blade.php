@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    <form action="#" method="get">
      <label for="users_rsvps">My RSVPs</label>
      <select class="form-control" id="rsvp_id" name="rsvp_id">
        <option disabled selected label="Select"></option>



      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

      <img src="{{'img/uploads/events/' . $event->img }}" alt="" />
      <h1>{{ $event->title }}</h1>
      <h3>{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</h3>
      <h3>Event owner: <a href="{{ action('CompaniesController@show', $id = $event_owner->id) }}">{{ $event_owner->name }}</a></h3>
      <br>
      <p>
        {{ $event->desc }}
      </p>
      <p>
        {{ $event->invite_only }}
      </p>
      <p>
        {{ $event->rsvp_required }}
      </p>
      <br>
      <p>
        {{ $event->url }}
      </p>
      @if(Auth::user()->id == $event->company_id && !Auth::user()->is_admin)
        <form action="{{ action('EventsController@edit', $id = $event->id) }}" method="get">
          <button type="submit">Edit</button>
        </form>
        <form action="{{ action('EventsController@destroy', $id = $event->id) }}" method="post">
          {!! csrf_field() !!}
          {{ method_field('DELETE') }}
          <button type="submit">Delete</button>
        </form>
      @endif
  </div>


  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
    <div class="panel_white">
			<h3 class="text-center">My Events</h3>
			@foreach ($users_events as $key => $event)
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
						{{ str_limit($event->desc, 100) }}<a class="red_link" href="{{ action('EventsController@show', $id = $event->id) }}"> see event</a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
      @if(!Auth::user()->is_admin)
      <a href="{{ action('EventsController@create') }}">Create New Event</a>
      @endif
			<div class="panel_green">
				<a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
			</div>
		</div>


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
