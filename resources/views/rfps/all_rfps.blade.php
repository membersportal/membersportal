@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Requests for Proposals</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		<div class="panel_white">
			@include('partials.my_sub_proposals_box')
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="panel_white rfp_search">
			<h3 class="text-center">Search RFPs</h3>
			<form action="{{ action('RFPController@searchRfps') }}" method="GET">
				<input type="text" class="form-control" name="search_field" value="{{ old('search_field') }}" placeholder="Search RFPs by company name">
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

		@if (count($week_rfps) != 0)
			<div class="panel_white all_rfps">
				<h3 class="text-center">Due This Week</h3>
				@include('partials.rfps_by_date', ['rfps' => $week_rfps])
			</div>
		@endif
		@if (count($month_rfps) != 0)
			<div class="panel_white all_rfps">
			<h3 class="text-center">Due This Month</h3>
				@include('partials.rfps_by_date', ['rfps' => $month_rfps])
			</div>
		@endif
		@if (count($year_rfps) != 0)
			<div class="panel_white all_rfps">
			<h3 class="text-center">Due This Year</h3>
				@include('partials.rfps_by_date', ['rfps' => $year_rfps])
			</div>
		@endif
		</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		<div class="panel_white">
			@include('partials.my_rfps_box', ['users_rfps' => $users_rfps])
		</div>
		@if (!Auth::user()->is_admin)
		<div class="panel_white">
			@include('partials.conn_rfps_box', ['company_rfps' => $connections_rfps])
		</div>
		@endif
	</div>

</div>

@stop
