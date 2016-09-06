@extends('layouts.master')

@section('content')

<div class="container">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 edit_nav">	
		<div class="row edit_account_nav">
			<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
				@include('partials.edit_account_nav', ['login' => '', 'company' => 'active', 'contact' => ''])
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 nav_triangle"></div>
		</div>
	</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

			<form enctype="multipart/form-data" class="" action="{{ action('CompaniesController@update', ['id' => $company->id]) }}" method="POST">
				{!! csrf_field() !!}
				@include('partials.edit_company_form')

				<button type="submit" class="btn btn-default">Save</button>
		</div>

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
			@include('partials.edit_company_images_form')

		</form>
		</div>
	</div>
</div>

@stop
