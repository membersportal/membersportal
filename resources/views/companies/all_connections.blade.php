@extends('layouts.master')

@section('content')

<div class="container">
	<h1>My Connections</h1>

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
			<div class="panel_white">
				@include('partials.conn_rfps_box', ['company_rfps' => $company_rfps])
			</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
			<div class="row">
			@foreach ($connections as $connection)
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="panel_white text-center">
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

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
			<div class="panel_white">
				@include('partials.conn_events_box', ['connections_events' => $company_events])
			</div>
		</div>

</div>
@stop