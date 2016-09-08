@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">All Events</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
		<div class="panel_white">
			<h3 class="text-center">My RSVPs</h3>
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">Event Title
						</a>
						</h4>
						<p class="event_date_home">Dates</p>
					</div>
					<div id="collapse" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading">
					Description of event blah blah blah...<a class="red_link" href="#" target="_blank"> see event</a>
					</div>
				</div>
			</div>
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">Event Title
						</a>
						</h4>
						<p class="event_date_home">Dates</p>
					</div>
					<div id="collapse" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading">
					Description of event blah blah blah...<a class="red_link" href="#" target="_blank"> see event</a>
					</div>
				</div>
			</div>
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">Event Title
						</a>
						</h4>
						<p class="event_date_home">Dates</p>
					</div>
					<div id="collapse" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading">
					Description of event blah blah blah...<a class="red_link" href="#" target="_blank"> see event</a>
					</div>
				</div>
			</div>
			<div class="panel_green">
				<a class="green_bg" href="#" alt="Add An RSVP">Add An RSVP</a>
			</div>
		</div>
	</div>


	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
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
		{{ dd($events) }}
		@foreach($events as $event)
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
					<img class="img-responsive events_grid" src="http://fillmurray.com/100/100" alt="">
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					<h4 class="event_heading"><a href="{{ $event->url }}" target="_blank">{{ $event->title }}</a></h4>
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
			<div class="panel_green">
				<a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
			</div>
			@if(!Auth::user()->is_admin)
			<div class="panel_beige">
				<a class="beige_bg" href="{{ action('EventsController@create') }}" alt="Create New Event">Create New Event</a>
			</div>
			@endif
		</div>


	<div class="panel_white">
		<h3 class="text-center">Connections' Events</h3>
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
</div>
@stop
