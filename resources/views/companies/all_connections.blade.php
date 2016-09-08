@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center space">My Connections</h1>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
			<div class="panel_white connections_events">
			<h3 class="text-center">Connections' Events</h3>
			@foreach ($company_events as $key => $company_event)
				@foreach ($company_event as $event)
				<div id="accordion" role="tablist" aria-multiselectable="false">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading{{$key+1}}">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $event->title }}
							</a>
							</h4>
							<p class="event_company_name">{{ $event->company->name }}</p>
							<p class="event_date_home">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</p>
						</div>
						<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
						{{ str_limit($event->desc, 100) }}<a class="red_link" href="{{ action('EventsController@show', ['id' => $event->id]) }}" target="_blank"> see event</a>
						</div>
					</div>
				</div>
				@endforeach
			@endforeach
			<div class="panel_green">
				<a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
			</div>
		</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
			<div class="row">
			@foreach ($connections as $connection)
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="panel_white connections_grid">
						<a href="{{ action('CompaniesController@show', ['id' => $connection->id]) }}" alt="{{ $connection->name }} Profile">
							<img class="img-circle img-thumbnail center-block img-responsive connections_grid" src="{{ '/img/uploads/avatars/' . $connection->profile_img }}">
						</a>
						<p class="company_name">{{ $connection->name }}</p>
						<p class="industry_name">{{ $connection->industry->industry }}</p>
					</div>
				</div>
			@endforeach
			</div>
		</div>
</div>

@stop
