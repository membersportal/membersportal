@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center">Edit Contact Information</h1>
	<p class="text-center"><span class="required">*</span> Required Field</p>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1  col-xl-offset-1 edit_nav">  
		<div class="row edit_account_nav">
			<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
				@include('partials.edit_account_nav', ['login' => '', 'company' => '', 'contact' => 'active'])
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
				<div class="nav_triangle_div">
					<div class="nav_triangle_3"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_form">
			<form action="{{ action('ContactsController@update', ['id' => $contact->id]) }}" method="POST">
				{!! csrf_field() !!}
				@include('partials.edit_contact_form')
				<button class="btn btn-primary pull-right" type="submit">Save</button>
				<a class="cancel_button pull-right" href="{{ action('UsersController@index') }}" alt="cancel">Cancel</a>
			</form>
		</div>
	</div>
</div>
@stop