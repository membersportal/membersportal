@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="req">Edit Company Information</h1>
	<p class="text-center"><span class="required">*</span> Required Field</p>
	<div class="row">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1  col-xl-offset-1 edit_nav">
			@include('partials.edit_account_nav', ['login' => '', 'company' => 'active', 'contact' => '', 'leaders' => ''])
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
			<div class="panel_form">
				<form enctype="multipart/form-data" action="{{ action('CompaniesController@update', ['id' => $company->id]) }}" method="POST">
					{!! csrf_field() !!}
					{{ method_field('PUT') }}
					@include('partials.edit_company_form')
					@include('partials.edit_company_images_form')
					<button class="btn btn-primary pull-right" type="submit">Save</button>
					<a class="cancel_button pull-right" href="{{ action('UsersController@index') }}" alt="cancel">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>

@stop

@section('bottom-script')
<script type="text/javascript">
	"use strict";
	$(document).ready(function() {
		$('select').change(function() {
			var business_type = $('#business_type').val();
			if (business_type == 'contractor') {
				$('#size').attr('disabled', true);
				$('#size').val() = null;
			} else {
				$('#size').attr('disabled', false);
			}
		})
	});
</script>
@stop