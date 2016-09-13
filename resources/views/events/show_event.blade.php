@extends('layouts.master')

@section('content')
<div class="container">
	<h5><a href="{{ action('EventsController@index') }}">Back</a></h5>
	<h1>{{ $event->title }}</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
			@if(!Auth::user()->is_admin)
			<div class="panel_white">
				@include('partials.my_rsvps_box')
			</div>
			@endif
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
			<div class="panel_white {{ (Auth::user()->id == $event->company_id && !Auth::user()->is_admin) ? 'event_search' : '' }}">
				<img class="img-responsive events" src="{{ '/img/uploads/events/' . $event->img }}" alt="{{ $event->name }}">
				@if ($event->from_date != $event->to_date)
					<h3 class="text-center event_owner">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j, Y') }}</h3>
				@else
				<h3 class="text-center event_owner">{{ $event->from_date->format('F j, Y') }}</h3>
				@endif
				<p class="text-center">Hosted By <a class="red_link" href="{{ action('CompaniesController@show', $id = $event_owner->id) }}">{{ $event_owner->name }}</a></p>
				<div class="text-center">
					@if ($event->invite_only)
						<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>Invite Only</p>
					@endif
					@if ($event->rsvp_required)
						<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>RSVP Required</p>
				</div>
					@endif
				<h4 class="top8">Event Description</h4>
				<p class="event_desc">{{ $event->desc }}<a class="red_link" href="{{ $event->url }}" target="_blank" alt="{{ $event->title }}"> full ></a></p>

				@if(Auth::user()->id == $event->company_id && !Auth::user()->is_admin)
					<a href="{{ action('EventsController@edit', $id = $event->id) }}" class="edit_button pull-right">Edit</a>
					<form action="{{ action('EventsController@destroy', $id = $event->id) }}" method="POST">
						{!! csrf_field() !!}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger pull-right" type="submit">Delete</button>
					</form>
				@endif
			</div>
		</div>

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
			@if (!Auth::user()->is_admin)
			<div class="panel_white">
				@include('partials.my_events_box', ['users_events' => $users_events])
			</div>
			<div class="panel_white">
				@include('partials.conn_events_box', ['connections_events' => $connections_events])
			</div>
			@endif
		</div>
	</div>

</div>

@stop
