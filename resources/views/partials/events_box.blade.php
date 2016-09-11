<div class="panel_white events">
	<h3 class="text-center">Events</h3>
	@foreach ($events as $key => $event)
		@if ($key < 3)
		<div id="accordion" role="tablist" aria-multiselectable="false">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading{{$key+1}}">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $event->title }}</a>
					</h4>
					@if ($event->from_date != $event->to_date)
						<p class="event_date_home">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</p>
					@else
						<p class="event_date_home">{{ $event->from_date->format('F j') }}</p>
					@endif
				</div>
				<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
				{{ str_limit($event->desc, 100) }}
					<a href="#">see event</a>
				</div>
			</div>
		</div>
		@endif
	@endforeach
	<div class="panel_green">
		<a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
	</div>
</div>