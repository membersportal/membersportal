@extends('layouts.master')
@section('content')

<div class="container">
	<h1>Manage RFPs</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
			@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => 'active', 'users' => ''] )
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
			<div class="panel_white rfps">
				<div class="summary">
					<p class="text-center"><span class="strong">Total:</span> {{ count($rfps) }} &nbsp;&nbsp;//&nbsp;&nbsp; <span class="strong">Last RFP Added:</span> {{ $rfps[0]->created_at->format('F j Y') }}</p>
					<a href="{{ action('AdminController@createRfp') }}" class="create_button">Create New RFP</a>
				</div>
				@foreach ($rfps as $key => $rfp)
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<h4 class="rfp_heading"><a href="{{ action('RFPController@show', $id = $rfp->id) }}"><span class="strong">{{ $rfp->project_title }}</span></a></h4>

							<p class="rfp_dates">
								<span class="strong deadline">DEADLINE:</span>
								{{ $rfp->deadline->format('F j, Y') }}
							</p>

							<p class="rfp_dates">
								<span class="strong">Contract:</span> 
								{{ $rfp->contract_from_date->format('F j, Y') }} - {{ $rfp->contract_to_date->format('F j, Y') }}
							</p>
							
							<p class="rfp_contact">
								<span class="strong">Contact:</span> 
								{{ $rfp->contact_name }}</span>
								&nbsp; // &nbsp;
								<span class="strong">Phone:</span>
								{{ '(' . substr($rfp->contact_no, 0, 3) . ') ' . substr($rfp->contact_no, 3, 3) . '-' . substr($rfp->contact_no, 6, 4) }}
							</p>
							
							<p class="rfp_desc">{{ str_limit($rfp->project_scope, 300) }}<a class="red_link" href="{{ action('RFPController@show', ['id' => $rfp->id]) }}" alt="{{ $rfp->project_title }}">&nbsp;&nbsp;full ></a></p>
						</div>
						<a href="{{ action('AdminController@editRfp', ['id' => $rfp->id]) }}" class="edit_button pull-right">Edit</a>
						<form method="POST" action="{{ action('AdminController@destroyRfp', ['id' => $rfp->id]) }}">
							{{ method_field('DELETE') }}
							{!! csrf_field() !!}
							<button class="btn btn-danger pull-right" type="submit">Delete</button>
						</form>
					</div>
					@if ($rfp != $rfps[(count($rfps) - 1)])
						<hr class="wide">
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>

@stop