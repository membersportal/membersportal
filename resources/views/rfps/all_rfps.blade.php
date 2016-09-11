@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Requests for Proposals</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		@include('partials.my_sub_proposals_box')
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="rfp_search">
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
		@foreach ($rfps as $key => $rfp)
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<h4 class="rfp_heading"><a href="{{ action('RFPController@show', $id = $rfp->id) }}">{{ $rfp->project_title }}</a></h4>
					<p class="rfp_dates">Deadline: <span class="rfp_date">{{ $rfp->deadline }}</span></p>&nbsp;&nbsp; || &nbsp;&nbsp;
					<p class="rfp_dates">Project Dates: <span class="rfp_date">{{ $rfp->contract_from_date }} - {{ $rfp->contract_to_date }}</span></p>
					<p class="rfp_contact">Contact: <span class="rfp_contact_detail">{{ $rfp->contact_name }}</span>&nbsp;&nbsp; || &nbsp;&nbsp;Dept: <span class="rfp_contact_detail">{{ $rfp->contact_department }}</span>&nbsp;&nbsp; || &nbsp;&nbsp;Phone:</span> <span class="rfp_contact_detail">{{ $rfp->contact_no }}</span></p>
					<p class="rfp_desc">{{ str_limit($rfp->project_scope, 300) }}<a class="red_link" href="{{ action('RFPController@show', ['id' => $rfp->id]) }}" alt="{{ $rfp->project_title }}">&nbsp;&nbsp;Read full RFP</a></p>
				</div>
			</div>
			@if ($rfp != $rfps[(count($rfps) - 1)])
				<hr class="wide">
			@endif
		@endforeach
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
		@include('partials.my_rfps_box', ['users_rfps' => $users_rfps])
		@include('partials.conn_rfps_box', ['company_rfps' => $connections_rfps])
	</div>

</div>

@stop
