@extends('layouts.master')
@section('content')

<div class="container">
	<h1 class="req">Create Leaders</h1>
	<p class="text-center"><span class="required">*</span> Required Field</p>
	<div class="row">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">
			@include('partials.edit_account_nav', ['login' => '', 'company' => '', 'contact' => '', 'leaders' => 'active'])
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
			<div class="panel_white all_leaders">
				@if (count($leaders) < 3)
				<div class="summary">
						<p class="text-center">You've added {{ count($leaders) }} leaders to your company's profile. You can add {{ 3 - count($leaders) }} more.</p>
						<a href="{{ action('LeadersController@create') }}" class="create_button">Create New Leader</a>
				</div>
				@endif
				@foreach($leaders as $leader)
				<div class="row text-center center-block leaders">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						<img class="img-circle img-thumbnail all_leaders" src="{{ '/img/uploads/leaders/' . $leader->img }}" alt="{{ $leader->full_name }}">
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
						<h5 class="leader_name">{{ $leader->full_name }}</h5>
						<p class="leader_title">{{ $leader->title }}</p>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 leader_buttons">
						<a href="{{ action('LeadersController@edit', ['id' => $leader->id]) }}" class="edit_button pull-right">Edit</a>
						<form method="POST" action="{{ action('LeadersController@destroy', ['id' => $leader->id]) }}">
							{{ method_field('DELETE') }}
							{!! csrf_field() !!}
							<button class="btn btn-danger pull-right" type="submit">Delete</button>
						</form>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@stop