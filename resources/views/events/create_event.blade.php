@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center space">Create Event</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		@include('partials.my_rsvps_box')
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="panel_form">
			<form method="POST" action="{{ action('EventsController@store') }}" enctype="multipart/form-data">
					{!!csrf_field()!!}
					@include('partials.create_event_form')
				<button class="btn btn-primary pull-right" type="submit">Create</button>
			</form>
			<a class="cancel_button pull-right" href="{{ action('EventsController@index') }}" alt="cancel">Cancel</a>
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		@include('partials.my_events_box', ['users_events' => $users_events])
		@include('partials.conn_events_box', ['connections_events' => $connections_events])
	</div>

</div>

@stop
