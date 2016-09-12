@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Edit Leaders</h1>
	<p class="text-center"><span class="required">*</span> Required Field</p>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">
		@include('partials.edit_account_nav', ['login' => '', 'company' => '', 'contact' => '', 'leaders' => 'active'])
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_form">
			<form method="POST" action="{{ action('LeadersController@update', ['id' => $leader->id]) }}" enctype="multipart/form-data">
				{!! csrf_field() !!}
        {{ method_field('PUT') }}
				@include('partials.edit_leader_form')
				<button class="btn btn-primary pull-right" type="submit">Save</button>
				<a class="cancel_button pull-right" href="{{ action('LeadersController@index') }}" alt="cancel">Cancel</a>
			</form>
		</div>
	</div>
</div>
@stop
