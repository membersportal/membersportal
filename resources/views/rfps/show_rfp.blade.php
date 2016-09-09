@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center space">{{ $rfp->project_title }}</h1>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
		<div class="panel_white">
			<h3 class="text-center">Submitted Proposals</h3>
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">Project Title
						</a>
						</h4>
						<p class="event_date_home">Submitted Date</p>
					</div>
					<div id="collapse" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading">Brief description of project...
					<a class="red_link" href="#" target="_blank"> see proposal</a>
					</div>
				</div>
			</div>
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">Project Title
						</a>
						</h4>
						<p class="event_date_home">Submitted Date</p>
					</div>
					<div id="collapse" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading">Brief description of project...
					<a class="red_link" href="#" target="_blank"> see proposal</a>
					</div>
				</div>
			</div>
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="false" aria-controls="collapse">Project Title
						</a>
						</h4>
						<p class="event_date_home">Submitted Date</p>
					</div>
					<div id="collapse" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading">Brief description of project...
					<a class="red_link" href="#" target="_blank"> see proposal</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<div class="panel_white">
			<h3 class="text-center">Project Details</h3>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<ul class="rfps_all">
						<li><span class="strong">Company:</span>&nbsp; <a class="red_link" href="{{ action('CompaniesController@show', $id = $rfp_owner->id) }}">{{ $rfp_owner->name }}</a></li>
						<li><span class="strong">Deadline For Submission:</span>&nbsp; {{ $rfp->deadline }}</li>
						<li><span class="strong">Project Dates:</span>&nbsp; {{ $rfp->contract_from_date }} - {{ $rfp->contract_to_date }}</li>
					</ul>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1">
					<ul class="rfps">
						<li><span class="strong">Contact:</span>&nbsp; {{ $rfp->contact_name }}</li>
						<li><span class="strong">Number:</span>&nbsp; {{ $rfp->contact_no }}</li>
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

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
		<div class="panel_white">
			<h3 class="text-center">My RFPs</h3>
			@foreach ($users_rfps as $key => $rfp)
				@if ($key < 3)
				<div id="accordion" role="tablist" aria-multiselectable="false">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading{{$key+1}}">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->project_title }}
							</a>
							</h4>
							<p class="event_date_home">Deadline: {{ $rfp->deadline }}</p>
						</div>
						<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
						{{ str_limit($rfp->project_scope, 100) }}<a class="red_link" href="{{ action('RFPController@show', $id = $rfp->id) }}"> see request</a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
			<div class="panel_green">
				<a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All RFPs</a>
			</div>
			@if(!Auth::user()->is_admin)
			<div class="panel_beige">
				<a class="beige_bg" href="{{ action('RFPController@create') }}" alt="Create New RFP">Create New RFP</a>
			</div>
			@endif
		</div>

	<div class="panel_white all_rfps">
		<h3 class="text-center">My Connections' RFPs</h3>
		@foreach ($connections_rfps as $key => $rfp)
			@if ($key < 3)
			<div id="accordion" role="tablist" aria-multiselectable="false">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading{{$key+1}}">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->project_title }}
						</a>
						</h4>
						<p class="event_date_home">Deadline: {{ $rfp->deadline }}</p>
					</div>
					<div id="collapse{{$key+1}}" class="panel-collapse collapse rfp_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
					{{ str_limit($rfp->project_scope, 100) }}<a class="red_link" href="#" target="_blank"> see event</a>
					</div>
				</div>
			</div>
			@endif
		@endforeach
		<div class="panel_green">
			<a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All</a>
		</div>
	</div>

</div>
</div>

@stop
