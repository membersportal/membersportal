@extends('layouts.master')
@section('content')
<div class="row">

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		<div id="newest_member">
			<h3 class="text-center">Newest Member</h3>
			<a href="{{ action('CompaniesController@show', $newest_member->id) }}" alt="New Member">
				<img class="img-thumbnail img-responsive center-block profile_photo_home" src="/img/profile_photo_template.png">
			</a>
			<p class="company_name text-center">{{ $newest_member->name }}</p>
			<p class="industry_name_home text-center"><span class="industry_name_home">Industry:</span> {{ $newest_member->industry->industry }}</p>
			<p class="text-center company_desc_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img class="first-slide" src="{{ '/img/carousel' . $carousels[0]->img }}" alt="First slide">
			<div class="container">
			<div class="carousel-caption">
				<h1>Example headline.</h1>
				<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
				<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
			</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
			<div class="container">
			<div class="carousel-caption">
				<h1>Another example headline.</h1>
				<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
			</div>
			</div>
		</div>
		<div class="item">
			<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
			<div class="container">
			<div class="carousel-caption">
				<h1>One more for good measure.</h1>
				<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
			</div>
			</div>
		</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
		</a>
	</div><!-- /.carousel -->


		<div class="row">
			<div class="col-xs-3">
				<img src="" alt="">
			</div>
			<div class="col-xs-9">
				<p>
					This is some text for an article that will be viewed on the homepage for all users to see...<a href="#">continue</a>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-3">
				<img src="" alt="">
			</div>
			<div class="col-xs-9">
				<p>
					This is some text for an article that will be viewed on the homepage for all users to see...<a href="#">continue</a>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-3">
				<img src="" alt="">
			</div>
			<div class="col-xs-9">
				<p>
					This is some text for an article that will be viewed on the homepage for all users to see...<a href="#">continue</a>
				</p>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
		<h3 class="text-center">Events</h3>
			@foreach ($admin_events as $event)
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p class="event_title_home"><a href="{{ $event->url }}" target="_blank">{{ $event->title }}</a></p>
						<p class="event_company_home">{{ str_limit($event->desc, 100) }}</p>
						<p class="event_dates">{{ $event->from_date }} - {{ $event->to_date }}</p>
					</div>
				</div>
			@endforeach
		<a class="twitter-timeline" href="https://twitter.com/search?q=from%3A{{ $admin_user->contact->twitter }}" data-widget-id="771057747718582272" data-screen-name="{{ $admin_user->contact->twitter }}">Tweets about </a>
        	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>
@stop