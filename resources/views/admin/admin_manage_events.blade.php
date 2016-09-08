@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Manage Events</h1>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
			@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => 'active', 'rfps' => '', 'users' => ''] )
		</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white events">
		<div class="summary">
			<p class="text-center"><span class="strong">Total:</span> {{ count($events) }} &nbsp;&nbsp;//&nbsp;&nbsp; <span class="strong">Last Event Added:</span> {{ $events[0]->created_at->format('F j Y') }}</p>
			<a href="{{ action('AdminController@createEvent') }}" class="create_button">Create New Event</a>
		</div>
			@foreach ($events as $key => $event)
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
					<p class="event_desc">{{ str_limit($event->desc, 300) }}</p>
					<a href="{{ action('AdminController@editEvent', ['id' => $event->id]) }}" class="edit_button pull-right">Edit</a>
					<form method="POST" action="{{ action('AdminController@destroyEvent', ['id' => $event->id]) }}">
						{{ method_field('DELETE') }}
						{!! csrf_field() !!}
						<button class="btn btn-danger pull-right" type="submit">Delete</button>
				</form>
				</div>
			</div>
			@if (($key + 1) % $paginate != 0 && $key !== (count($events) - 1))
				<hr class="wide">
			@endif
			@endforeach
		</div>
	</div>
</div>

@stop