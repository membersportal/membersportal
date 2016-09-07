@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Analytics &amp; Tracking</h1>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
		@include('partials.admin_dash_nav', ['home' => 'active', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => ''] )
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<!-- Google Analytics stuff -->
	</div>

</div>

@stop