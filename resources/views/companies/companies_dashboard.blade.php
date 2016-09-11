@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center">Dashboard</h1>
	<h3 class="text-center company_name_profile">{{ $company->name }}</h3>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		@include('partials.my_rfps_box', ['users_rfps' => $users_rfps])
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="main_panel">
			<h3 class="text-center feed">My Feed</h3>
		@foreach($feed_content as $content)
			@if($content->company1_id)
			<div class="row">
				<div class="connection_feed">
					<p class="dashboard_category">Connection</p>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
							<div class="text-center">
								<a href="{{ action('CompaniesController@show', ['id' => $content->company1_id]) }}" alt="{{ $content->company1_id->name }}">
									<img class="img-thumbnail img-circle dash_connection" src="{{ '/img/uploads/avatars/' . $content->company1_id->profile_img }}" alt="{{ $content->company1_id->name }}">
								</a>
								<h4 class="text-center"><span class="strong connection">{{ $content->company1_id->name }}</span></h4>
							</div>
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
							<h4><span class="glyphicon glyphicon-arrow-right"></span></h4>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="text-center">
								<a href="{{ action('CompaniesController@show', ['id' => $content->company1_id]) }}" alt="{{ $content->company1_id->name }}">
									<img class="img-thumbnail img-circle dash_connection" src="{{ '/img/uploads/avatars/' . $content->company2_id->profile_img }}" alt="{{ $content->company2_id->name }}">
								</a>
								<h4><span class="strong connection">{{ $content->company2_id->name }}</span></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			@elseif($content->project_title)
			<div class="row">
				<div class="rfp_feed">
					<p class="dashboard_category">RFP</p>
					<a href="{{ action('RFPController@show', ['id' => $content->id]) }}" alt="{{ $content->project_title }}">
						<h4 class="text-center">{{ $content->project_title }}</h4>
					</a>
					<p class="rfp_dates">Deadline: <span class="rfp_date">{{ $content->deadline }}</span></p>&nbsp;&nbsp; || &nbsp;&nbsp;
					<p class="rfp_dates">Project Dates: <span class="rfp_date">{{ $content->contract_from_date }} - {{ $content->contract_to_date }}</span></p>
				</div>
			</div>
			@elseif($content->title)
			<div class="row">
				<div class="event_feed">
					<p class="dashboard_category">Event</p>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<img class="img-responsive events_dash" src="{{ '/img/uploads/events/' . $content->img }}" alt="{{ $content->title }}">
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
							<h4 class="event_heading_dash">
								<a href="{{ $content->url }}" target="_blank">{{ $content->title }}</a>
							</h4>
							<p class="event_date_home">{{ $content->from_date->format('F j') }} - {{ $content->to_date->format('F j') }}</p>
							@if ($content->invite_only)
								<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>Invite Only</p>
							@endif
							@if ($content->rsvp_required)
								<p class="event_boolean"><span class="glyphicon glyphicon-ok"></span>RSVP Required</p>
							@endif
						</div>
					</div>
				</div>
			</div>
			@endif
		@endforeach
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		@include('partials.my_events_box', ['users_events' => $users_events])
	</div>

</div>

@stop
