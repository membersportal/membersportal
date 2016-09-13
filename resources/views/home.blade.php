@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left">

			<div class="panel_white">
				<h3>Newest Member</h3>
				<a href="{{ action('CompaniesController@show', $newest_member->id) }}" alt="New Member">
					<img class="img-thumbnail img-responsive center-block profile_photo_home" src="{{ '/img/uploads/avatars/' . $newest_member->profile_img }}">
				</a>
				<p class="company_name text-center">{{ $newest_member->name }}</p>
				<p class="industry_name_home text-center"><span class="industry_name_home">Industry:</span> {{ $newest_member->industry->industry }}</p>
				<p class="text-center company_desc_home">{{ str_limit($newest_member->desc, 135) }}</p>
				<div class="panel_green">
					<a class="green_bg" href="{{ action('CompaniesController@searchMembers') }}" alt="Find New Connections">Search Members</a>
				</div>
			</div>

			<div class="panel_red">
				<h3 class="red_panel_head">We're Hiring!</h3>
				<img class="hiring img-responsive" src="/img/hiring.jpg">
				<p class="red_panel_text">Browse our job postings and submit your resume for consideration.</p>
			</div>

			<div class="panel_white">
				@include('partials.rfps_box', ['rfps' => $admin_rfps])
			</div>

		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center">

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
				</a></div>

			<div class="main_panel">
				<h3 class="sm_bottom_margin">City News</h3>
				<p class="text-center">
					<a class="green_link" href="{{ action('ArticlesController@index') }}" alt="Read More Articles">See All</a>
				</p>
				@foreach ($articles as $key => $article)
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						<a href="{{ $article->url }}">
							<img class="img-responsive articles" src="{{ '/img/articles/' . $article->img }}" alt="{{ $article->heading}}">
						</a>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
						<h4 class="article_heading">{{ $article->heading }}<span class="article_date">&nbsp;&nbsp;//&nbsp;&nbsp;{{ $article->date->format('F j Y') }}</span></h4>
						@if ($article->subheading)
						<h5>{{ $article->subheading }}</h5>
						@endif
						<p class="article_desc">{{ str_limit($article->desc, 75) }}
							<a class="red_link" href="{{ $article->url }}"> continue reading</a>
						</p>
					</div>
				</div>
				@if ($key != 4)
					<hr>
				@endif
				@endforeach
			</div>
		</div>

		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
			<div class="panel_white">
				@include('partials.events_box', ['events' => $admin_events])
			</div>

			<div class="panel_white social">
				<h3 class="social">Follow Us</h3>
				@if ($contact->facebook)
					<a href="http://www.facebook.com/{{ $contact->facebook }}"><img class="social_media_icon" src="/img/facebook-dreamstale25.png" alt="facebook" /></a>
				@endif
				@if ($contact->instagram)
					<a href="http://www.instagram.com/{{ $contact->instagram }}"><img class="social_media_icon" src="/img/instagram-dreamstale43.png" alt="instagram" /></a>
				@endif
				@if ($contact->linkedin)
					<a href="http://www.linkedin.com/in/{{ $contact->linkedin }}"><img class="social_media_icon" src="/img/linkedin-dreamstale45.png" alt="linkedin" /></a>
				@endif
				@if ($contact->google_plus)
					<a href="http://plus.google.com/{{ $contact->google_plus }}"><img class="social_media_icon" src="/img/google+-dreamstale37.png" alt="google+" /></a>
				@endif
			</div>
			<div class="panel_white">
				<a class="twitter-timeline" href="https://twitter.com/search?q=from%3A{{ $admin_user->contact->twitter }}" data-widget-id="771057747718582272" data-screen-name="{{ $admin_user->contact->twitter }}">Tweets about </a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<a href="https://twitter.com/jmills_business" class=" twitter-follow-button" data-show-count="false">Follow @jmills_business</a>
				<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		
	</div>
</div>

@stop