@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">All Events</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		@include('partials.my_rsvps_box')
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="event_search">
			<h3 class="text-center">Search Events</h3>
			<form action="{{ action('EventsController@searchEvents') }}" method="GET">
				<input type="text" class="form-control" name="search_field" value="{{ old('search_field') }}" placeholder="Search events by company name">
				<div class="form-group">
					<select class="form-control event_search_form" id="industry_id" name="industry_id">
						<option disabled selected label="Select Industry"></option>
						@foreach ($industries as $industry)
							<option value="{{ $industry->id }}">{{ $industry->industry }}</option>
						@endforeach
					</select>
				</div>
				<button class="btn btn-primary pull-right" type="Submit">Search</button>
			</form>
		</div>

		<div class="all_events">
		@foreach($events as $event)
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
					<img class="img-responsive events_grid" src="http://fillmurray.com/100/100" alt="">
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					<h4 class="event_heading"><a href="{{ action('EventsController@show', $id = $event->id) }}">{{ $event->title }}</a></h4>
					<p class="event_date_home">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</p>
					@if ($event->invite_only)
						<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>Invite Only</p>
					@endif
					@if ($event->rsvp_required)
						<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>RSVP Required</p>
					@endif
					<p class="event_desc">{{ $event->desc }}</p>
				</div>
			</div>
			@if ($event != $events[(count($events) - 1)])
			<hr class="wide">
			@endif
		@endforeach
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		@include('partials.my_events_box', ['users_events' => $users_events])
		@include('partials.conn_events_box', ['connections_events' => $connections_events])
	</div>

</div>

@stop
