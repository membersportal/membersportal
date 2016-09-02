@extends('layouts.master')
@section('content')
<div class="row">

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		<div class="home_panel">
			<h3 class="text-center">Newest Member</h3>
			<a href="{{ action('CompaniesController@show', $newest_member->id) }}" alt="New Member">
				<img class="img-thumbnail img-responsive center-block profile_photo_home" src="/img/profile_photo_template.png">
			</a>
			<p class="company_name text-center">{{ $newest_member->name }}</p>
			<p class="industry_name_home text-center"><span class="industry_name_home">Industry:</span> {{ $newest_member->industry->industry }}</p>
			<p class="text-center company_desc_home">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
		</div>

		<div class="home_panel">
			<h3 class="text-center">Request for Proposals</h3>
			@foreach ($admin_rfps as $key => $rfp)
				@if ($rfp->deadline > '2015-01-01')
				<ul>
					<li>
						<a href="#">{{ $rfp->project_title }}</a>
					</li>
				</ul>
				@endif
			@endforeach
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<a href="{{ $carousels[0]->url }}" target="_blank">
						<img class="first-slide" src="{{ '/img/carousel/' . $carousels[0]->img }}" alt="First slide">
						<div class="carousel-caption">
							<h3 class="carousel_head">{{ $carousels[0]->title }}</h3>
							<p>{{ $carousels[0]->desc }}</p>
						</div>
					</a>
				</div>
				<div class="item">
					<a href="{{ $carousels[1]->url }}" target="_blank">
						<img class="second-slide" src="{{ '/img/carousel/' . $carousels[1]->img }}" alt="Second slide">
						<div class="carousel-caption">
							<h3 class="carousel_head">{{ $carousels[1]->title }}</h3>
							<p>{{ $carousels[1]->desc }}</p>
						</div>
					</a>
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
		<div class="home_panel">
			<h3 class="text-center">Events</h3>
			@foreach ($admin_events as $key => $event)
				@if ($key < 3)
				<div id="accordion" role="tablist" aria-multiselectable="false">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading{{$key+1}}">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $event->title }}
							</a>
							</h4>
							<p class="event_date_home">{{ $event->from_date->format('F j') }} - {{ $event->to_date->format('F j') }}</p>
						</div>
					<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
					{{ str_limit($event->desc, 100) }}<a href="#">see event</a>
					</div>
					</div>
				</div>
				@endif
			@endforeach
		</div>
		<div class="home_panel twitter">
			<a class="twitter-timeline" href="https://twitter.com/search?q=from%3A{{ $admin_user->contact->twitter }}" data-widget-id="771057747718582272" data-screen-name="{{ $admin_user->contact->twitter }}">Tweets about </a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<a href="https://twitter.com/jmills_business" class=" twitter-follow-button" data-show-count="false">Follow @jmills_business</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
</div>
@stop
