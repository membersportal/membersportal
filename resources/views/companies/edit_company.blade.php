@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center">Edit Company Information</h1>
	<p class="text-center"><span class="required">*</span> Required Field</p>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 edit_nav">
		<div class="row edit_account_nav">
			<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
				@include('partials.edit_account_nav', ['login' => '', 'company' => 'active', 'contact' => ''])
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
				<div class="nav_triangle_div">
					<div class="nav_triangle_2"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<form enctype="multipart/form-data" action="{{ action('CompaniesController@update', ['id' => $company->id]) }}" method="POST">
			{!! csrf_field() !!}
			@include('partials.edit_company_form')
			@include('partials.edit_company_images_form')
			<button class="btn btn-primary pull-right" type="submit">Save</button>
			<a class="cancel_button pull-right" href="{{ action('UsersController@index') }}" alt="cancel">Cancel</a>
		</form>
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