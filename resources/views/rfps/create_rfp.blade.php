@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center space">Requests for Proposals</h1>
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

		<form enctype="multipart/form-data" class="" action="{{ action('RFPController@store') }}" method="post">
			{!! csrf_field() !!}
			@include('partials.create_rfp_form')

			<button type="submit" class="btn btn-default">Create</button>
			</form>
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