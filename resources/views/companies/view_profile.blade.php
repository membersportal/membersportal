@extends('layouts.master')

@section('content')
<div class="container">
	<div class="image_container">
		<div class="company_header_img">
			<img class="company_header" src="/img/uploads/headers/header_photo_template.jpg" alt="{{ $company->name }}">
		</div>
		<div class="company_profile_img">
			<img class="company_profile img-thumbnail" src="{{ '/img/uploads/avatars/' . $company->profile_img }}" alt="{{ $company->name }}">
		</div>
	</div>

	<h1 class="text-center company_name_profile">{{ $company->name }}</h1>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">
		@if (!Auth::user()->is_admin)
		<div class="connect">
			<form method="POST" action="{{ action('ConnectionsController@store', ['id' => $company->id]) }}">
				{!! csrf_field() !!}
				<button type="submit" class="btn btn-primary pull-right connect">Connect</button>
			</form>
		</div>
		@endif
		<div class="panel_white">
			<h3 class="text-center">Contact</h3>
			<ul class="contact">
				<li>{{ $contact->address_line_1 }}</li>
				<li>{{ $contact->city }}, {{ $contact->state }} {{ $contact->zip }}</li>
				<li><a class="red_link small_caps" href="{{ 'https://www.google.com/maps/search/' . $contact->address_line_1 . '+' . $contact->city . '+' . $contact->state . '+' . $contact->zip }}" target="_blank">Directions</a></li>
			</ul>
			<p class="strong">{{ $contact->phone_no }}</p>
			<p><a class="red_link" target="_blank" alt="{{ $company->name }}">{{ $contact->website }}</a></p>
		</div>

		<div class="panel_white rfps">
			<h3 class="text-center">Requests for Proposals</h3>
				@foreach ($rfps as $key => $rfp)
					@if ($key < 11)
						<ul class="rfps">
						@if ($rfp->deadline > '2015-01-01')
							<li class="rfps">
								<a class="red_link" href="#">{{ $rfp->project_title }}</a>
							</li>
							<li class="small_gray"><span class="strong">Deadline:</span> {{ $rfp->deadline }}</li>
							<li class="small_gray"><span class="strong">Contact:</span> {{ $rfp->contact_name }}</li>
						@endif
						</ul>
					@endif
			@endforeach
			<div class="panel_green">
				<a class="green_bg" href="#" alt="Browse All RFPs">Browse All RFPs</a>
			</div>
		</div>

	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
		<div class="about_panel_red">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<ul class="company_stats">
						@if($company->industry_id)
							<li><span class="strong">Industry: </span>{{ $company->industry->industry }}</li>
						@endif
						@if($company->contractor)
							<li><span class="strong">Business type:</span> Contractor</li>
						@endif
						@if($company->organization)
							<li><span class="strong">Business type:</span> Organization</li>
						@endif
						@if ($company->organization)
							<li><span class="strong">Company size: </span>{{ $company->size }}</li>
						@endif
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<ul class="company_stats">
						<li><span class="strong">Date established:</span> {{ $company->date_established }}</li>
						@if($company->woman_owned)
							<li><span class="glyphicon glyphicon-ok"></span>Woman-owned</li>
						@endif
						@if($company->family_owned)
							<li><span class="glyphicon glyphicon-ok"></span>Family-owned</li>
						@endif
					</ul>
				</div>
			</div>
		</div>

		<div class="panel_white">
			<h3 class="text-center">About</h3>
			<p>{{ $company->desc }}</p>
		</div>

		<img class="img-responsive project_showcase" src="/img/frostbank.jpg">
		<div class="main_panel project_showcase">
			<h3 class="text-center">Project Showcase</h3>
			<h4 class="text-center project_showcase">New Building Proposed for Downtown San Antonio</h4>
			<p>SAN ANTONIO — New renderings of the proposed Frost Bank headquarters show a vibrant, transformed area of downtown San Antonio as the city gears up to begin its review process of the design Wednesday.</p>
			<p>Released over the weekend by the Historic and Design Review Commission, the renderings lay out where the 23-story glass skyscraper would lie amid a sea of concrete and stone buildings.</p>
			<div class="text-center">
				<a class="red_link project" href="http://www.mysanantonio.com/business/article/City-releases-renderings-of-proposed-glass-8384186.php" alt="Read full article" target="_blank">See Full Project </a>
			</div>
		</div>

		<div class="panel_white leaders">
			<h3 class="text-center">Leadership</h3>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
						<a href="http://www.google.com" target="_blank">
							<img class="img-circle img-thumbnail leader_headshot center-block" src="/img/uploads/avatars/profile_photo_template.png">
						</a>
						<h5 class="leader_name">Jay Nichols</h5>
						<p class="leader_title">CEO</p>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
						<a href="http://www.google.com" target="_blank">
							<img class="img-circle img-thumbnail leader_headshot center-block" src="/img/uploads/avatars/profile_photo_template.png">
						</a>
						<h5 class="leader_name">Anthony Martinez</h5>
						<p class="leader_title">CEO</p>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
						<a href="http://www.google.com" target="_blank">
							<img class="img-circle img-thumbnail leader_headshot center-block" src="/img/uploads/avatars/profile_photo_template.png">
						</a>
						<h5 class="leader_name">Randi Mays</h5>
						<p class="leader_title">CEO</p>
					</div>
				</div>
		</div>

	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
		<div class="social_media panel_white text-center">
			<h3>Follow {{ $company->name }}</h3>
			<a href="http://www.facebook.com/{{ $contact->facebook }}"><img class="social_media_icon" src="/img/facebook-dreamstale25.png" alt="facebook" /></a>
			<a href="http://www.instagram.com/{{ $contact->instagram }}"><img class="social_media_icon" src="/img/instagram-dreamstale43.png" alt="instagram" /></a>
			<a href="http://www.linkedin.com/in/{{ $contact->linkedin }}"><img class="social_media_icon" src="/img/linkedin-dreamstale45.png" alt="linkedin" /></a>
			<a href="http://plus.google.com/{{ $contact->google_plus }}"><img class="social_media_icon" src="/img/google+-dreamstale37.png" alt="google+" /></a>
		</div>
		<div class="panel_white events">
			<h3 class="text-center">Events</h3>
			@foreach ($events as $key => $event)
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
			<div class="panel_green">
				<a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
			</div>
		</div>
			<div class="panel_white twitter">
				<a class="twitter-timeline" href="https://twitter.com/search?q=from%3A{{ $contact->twitter }}" data-widget-id="771057747718582272" data-screen-name="{{ $contact->twitter }}">Tweets about </a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					<a href="https://twitter.com/{{ $contact->twitter }}" class=" twitter-follow-button" data-show-count="false">Follow @{{ $contact-> }}</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>

			<div class="panel_white connections">
					<h3 class="text-center">Connections</h3>
					@foreach($profile_connections as $connection)
						<a href="{{ action('CompaniesController@show', $connection->id) }}"><img class="img-thumbnail connection_thumb" src="{{ '/img/uploads/avatars/' . $connection->profile_img }}" alt="{{ $connection->name }}"></a>
					@endforeach
					<div class="panel_green">
						<a class="green_bg" href="{{ action('CompaniesController@viewConnections', ['id' => $company->id]) }}" alt="View All Connections">All Connections</a>
					</div>
			</div>

		</div>

</div>
@stop
