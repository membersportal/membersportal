@foreach($events as $event)
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			<div class="events_grid_image">
				<img class="img-responsive events_grid" src="{{ '/img/uploads/events/' . $event->img }}" alt="{{ $event->title }}">
			</div>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
			<h4 class="event_heading"><a href="{{ action('EventsController@show', $id = $event->id) }}">{{ $event->title }}</a></h4>
			@if ($event->from_date != $event->to_date)
				<p class="event_date_home">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j, Y') }}</p>
			@else
				<p class="event_date_home">{{ $event->from_date->format('F j, Y') }}</p>
			@endif
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