@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center space">{{ $rfp->project_title }}</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
		<div class="panel_white">
			@include('partials.my_sub_proposals_box')
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
		<div class="panel_white">
			<h3 class="text-center">Project Details</h3>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
					<ul class="rfps_all">
						<li><span class="strong">Company:</span>&nbsp; <a class="blue_link" href="{{ action('CompaniesController@show', $id = $rfp_owner->id) }}">{{ $rfp_owner->name }}</a></li>
						<li><span class="strong deadline">DEADLINE:</span>
						{{ $rfp->deadline->format('F j, Y') }}</li>
						<li><span class="strong">Contract:</span> 
						{{ $rfp->contract_from_date->format('F j, Y') }} - {{ $rfp->contract_to_date->format('F j, Y') }}</li>
					</ul>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1">
					<ul class="rfps">
						<li><span class="strong">Contact:</span>&nbsp; {{ $rfp->contact_name }}</li>
						<li><span class="strong">Number:</span>&nbsp; {{ '(' . substr($rfp->contact_no, 0, 3) . ') ' . substr($rfp->contact_no, 3, 3) . '-' . substr($rfp->contact_no, 6, 4) }}</li>
						<li><span class="strong">Department:</span>&nbsp; {{ $rfp->contact_department }}</li>
					</ul>
				</div>
			</div>
			<h4 class="text-center">Project Scope</h4>
			<p class="project_scope">{{ $rfp->project_scope }}</p>

			@if(Auth::user()->id == $rfp->company_id && !Auth::user()->is_admin)
				<form action="{{ action('RFPController@edit', $id = $rfp->id) }}" method="get">
					<button class="btn btn-primary pull-right" type="submit">Edit</button>
				</form>
				<form action="{{ action('RFPController@destroy', $id = $rfp->id) }}" method="post">
					{!! csrf_field() !!}
					{{ method_field('DELETE') }}
					<button class="btn btn-danger pull-right" type="submit">Delete</button>
				</form>
			@else
			<div class="panel_beige">
				<a class="beige_bg" href="#" alt="Submit A Proposal">Submit A Proposal</a>
			</div>
			@endif
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

@stop