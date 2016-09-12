@extends('layouts.master')

@section('content')
<div class="container">
	<h1>All Events</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		<div class="panel_white">
			@include('partials.my_rsvps_box')
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="panel_white event_search">
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
		@if (count($week_events) != 0)
			<div class="panel_white">
				<h3 class="text-center">This Week</h3>
				@include('partials.events_by_date', ['events' => $week_events])
			</div>
		@endif
		@if (count($month_events) != 0)
			<div class="panel_white">
				<h3 class="text-center">This Month</h3>
				@include('partials.events_by_date', ['events' => $month_events])
			</div>
		@endif
		@if (count($year_events) != 0)
			<div class="panel_white">
				<h3 class="text-center">This Year</h3>
				@include('partials.events_by_date', ['events' => $year_events])
			</div>
		@endif
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		<div class="panel_white">
			@include('partials.my_events_box', ['users_events' => $users_events])
		</div>
		@if (!Auth::user()->is_admin)
		<div class="panel_white">
			@include('partials.conn_events_box', ['connections_events' => $connections_events])
		</div>
		@endif
	</div>

</div>

@stop
