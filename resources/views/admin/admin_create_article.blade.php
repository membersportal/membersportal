@extends('layouts.master')

@section('content')

<div class="container">
	<h1 class="text-center req">Create Article</h1>
	<p class="text-center req"><span class="required">*</span> Required Field</p>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">
		@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => 'active', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => ''] )
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_form">
			<form method="POST" action="{{ action('ArticlesController@store') }}" enctype="multipart/form-data">
				{!!csrf_field()!!}
				@include ('partials.admin_create_article_form')
				<button class="btn btn-primary pull-right" type="submit">Create</button>
			</form>
			<a class="cancel_button pull-right" href="{{ action('ArticlesController@adminIndex') }}" alt="cancel">Cancel</a>
		</div>
	</div>
</div>

@stop
