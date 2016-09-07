@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Manage Carousels</h1>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
			@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => '', 'carousels' => 'active', 'events' => '', 'rfps' => '', 'users' => ''] )
		</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white carousels">
			@foreach ($carousels as $key => $carousel)
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
					<img class="img-responsive carousels_grid" src="{{ '/img/carousel/' . $carousel->img }}" alt="">
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					<h4 class="carousel_heading"><a href="{{ $carousel->url }}" target="_blank">{{ $carousel->title }}</a></h4>
					<p class="carousel_desc">{{ $carousel->desc }}</p>
					<form method="GET" action="{{ action('CarouselsController@edit', ['id' => $carousel->id]) }}">
						<button class="btn btn-info pull-right" type="submit">Edit</button>
					</form>
					<form method="POST" action="{{ action('CarouselsController@destroy', ['id' => $carousel->id]) }}">
						{{ method_field('DELETE') }}
						{!! csrf_field() !!}
						<button class="btn btn-danger pull-right" type="submit">Delete</button>
				</form>
				</div>
			</div>
			@if (($key + 1) % $paginate != 0 && $key !== (count($carousels) - 1))
				<hr class="wide">
			@endif
			@endforeach
		</div>
	</div>
</div>

@stop