@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Edit Event</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		@include('partials.my_rsvps_box')
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="panel_form">
			<form action="{{ action('EventsController@update', $id = $event->id) }}" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
				{{ method_field('PUT') }}
					@include('partials.edit_event_form')
				<button class="btn btn-primary pull-right" type="submit">Save</button>
			</form>
			<form action="{{ action('EventsController@destroy', $id = $event->id) }}" method="post">
				{!! csrf_field() !!}
				{{ method_field('DELETE') }}
				<button class="btn btn-danger pull-right" type="submit" name="button">Delete</button>
			</form>
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		@include('partials.my_events_box', ['users_events' => $users_events])
		@include('partials.conn_events_box', ['connections_events' => $connections_events])
	</div>

</div>

@stop