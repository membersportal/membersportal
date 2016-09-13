@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Requests for Proposals</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
			<div class="panel_white">
				@include('partials.my_sub_proposals_box')
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
			<div class="panel_white button_space">
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

			<div class="panel_white all_rfps">
				@include('partials.rfps_by_date', ['rfps' => $rfps])
			</div>
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

</div>

@stop
