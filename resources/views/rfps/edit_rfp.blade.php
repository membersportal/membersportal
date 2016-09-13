@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Edit RFP</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">
			<div class="panel_white">
				@include('partials.my_sub_proposals_box')
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">
			<div class="panel_form">
				<form class="form-group" action="{{ action('RFPController@update', $id = $rfp->id) }}" method="post">
					{!! csrf_field() !!}
					{{ method_field('PUT') }}
					@include('partials.edit_rfp_form')
					<button class="btn btn-primary pull-right" type="submit">Save</button>
				</form>
				<form action="{{ action('RFPController@destroy', $id = $rfp->id) }}" method="POST">
					{!! csrf_field() !!}
					{{ method_field('DELETE') }}
					<button class="btn btn-danger pull-right" type="submit" name="button">Delete</button>
				</form>
				<a class="cancel_button" href="{{ action('RFPController@index') }}" alt="cancel">Cancel</a>
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