@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">{{ $event->title }}</h1>
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
		<div class="panel_white">
			<img class="img-responsive" src="http://www.fillmurray.com/600/300" alt="{{ $event->name }}">
				<h3 class="text-center event_owner">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</h3>
				<p class="text-center">Event owner: <a href="{{ action('CompaniesController@show', $id = $event_owner->id) }}">{{ $event_owner->name }}</a></p>
				<div class="text-center">
					@if ($event->invite_only)
						<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>Invite Only</p>
					@endif
					@if ($event->rsvp_required)
						<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>RSVP Required</p>
				</div>
					@endif
				<h4>Event Description</h4>
				<p class="event_desc">{{ $event->desc }}</p>
				<p class="text-center"><a class="red_link" href="{{ $event->url }}" target="_blank" alt="{{ $event->title }}">More Details</a></p>

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


	<div class="panel_white about">
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
