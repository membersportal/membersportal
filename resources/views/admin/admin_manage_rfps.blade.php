@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center space">Manage Events</h1>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
			@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => 'active', 'users' => ''] )
		</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white rfps">
			@foreach ($rfps as $key => $rfp)
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<h4 class="rfp_heading"><a href="{{ $rfp->url ? $rfp->url : '#' }}" target="_blank">{{ $rfp->project_title }}</a></h4>
					<p class="rfp_dates">Deadline: <span class="rfp_date">{{ $rfp->deadline }}</span></p>
					<p class="rfp_dates">Project Dates: <span class="rfp_date">{{ $rfp->contract_from_date }} - {{ $rfp->contract_to_date }}</span></p>
					<p class="rfp_contact">Contact: <span class="rfp_contact_detail">{{ $rfp->contact_name }}</span>&nbsp;&nbsp; || &nbsp;&nbsp;Dept: <span class="rfp_contact_detail">{{ $rfp->contact_department }}</span>&nbsp;&nbsp; || &nbsp;&nbsp;Phone: <span class="rfp_contact_detail">{{ $rfp->contact_no }}</span></p>
					@if ($rfp->invite_only)
						<p class="rfp_boolean"><span class="glyphicon glyphicon-ok"></span>Invite Only</p>
					@endif
					@if ($rfp->rsvp_required)
						<p class="rfp_boolean"><span class="glyphicon glyphicon-ok"></span>RSVP Required</p>
					@endif
					<p class="rfp_desc">{{ str_limit($rfp->desc, 300) }}</p>
					<a href="{{ action('EventsController@edit', ['id' => $rfp->id]) }}" class="edit_button pull-right">Edit</a>
					<form method="POST" action="{{ action('EventsController@destroy', ['id' => $rfp->id]) }}">
						{{ method_field('DELETE') }}
						{!! csrf_field() !!}
						<button class="btn btn-danger pull-right" type="submit">Delete</button>
				</form>
				</div>
			</div>
			@if (($key + 1) % $paginate != 0 && $key !== (count($rfps) - 1))
				<hr class="wide">
			@endif
			@endforeach
		</div>
	</div>
</div>

@stop