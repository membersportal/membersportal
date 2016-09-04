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

@if (!Auth::user()->is_admin)
	<form method="POST" action="{{ action('ConnectionsController@store', ['id' => $company->id]) }}">
		{!! csrf_field() !!}
		<button type="submit" class="btn btn-primary">Connect</button>
	</form>
@endif

	<h1 class="text-center company_name_profile">{{ $company->name }}</h1>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

		<div class="panel_white contact">
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
		</div>

	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
			
		<div class="about">
			<ul>
				@if($company->industry_id)
					<li>{{ $company->industry->industry }}</li>
				@endif
				@if($company->woman_owned)
					<span class="glyphicon glyphicon-ok"></span><li>Woman-owned</li>
				@endif
				@if($company->family_owned)
					<span class="glyphicon glyphicon-ok"></span><li>Family-owned</li>
				@endif
				@if ($company->organization)
					<li>Size: {{ $company->size }}</li>
				@endif
				@if($company->contractor)
					<li>Contractor</li>
				@endif
				@if($company->organization)
					<li>Organization</li>
				@endif
					<li>{{ $company->date_established }}</li>
			</ul>
		</div>

		<p>{{ $company->desc }}</p>

		<div class="leaders">
			<h3 class="text-center">Leadership</h3>
			@foreach ($leaders as $leader)
				<div class="leader">
					<img class="leader_headshot" src="{{ '/img/uploads/leaders' . $leader->img }}">
				</div>
				@endforeach
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
		<div class="social_media">
			<a href="http://www.facebook.com/{{ $contact->facebook }}"><img class="social_media_icon" src="/facebook-dreamstale25.png" alt="facebook" /></a>
			<a href="http://www.instagram.com/{{ $contact->instagram }}"><img class="social_media_icon" src="/instagram-dreamstale43.png" alt="instagram" /></a>
			<a href="http://www.linkedin.com/in/{{ $contact->linkedin }}"><img class="social_media_icon" src="/linkedin-dreamstale45.png" alt="linkedin" /></a>
			<a href="http://plus.google.com/{{ $contact->google_plus }}"><img class="social_media_icon" src="/google+-dreamstale37.png" alt="google+" /></a>
		</div>
		<div class="home_panel">
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
		</div>
			<div class="home_panel twitter">
				<a class="twitter-timeline" href="https://twitter.com/search?q=from%3A{{ $contact->twitter }}" data-widget-id="771057747718582272" data-screen-name="{{ $contact->twitter }}">Tweets about </a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					<a href="https://twitter.com/{{ $contact->twitter }}" class=" twitter-follow-button" data-show-count="false">Follow @{{ $contact-> }}</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>

			<div class="home_panel">
					<h3 class="text-center">Connections</h3>
					@foreach($profile_connections as $connection)
						<a href="{{ action('CompaniesController@show', $connection->id) }}"><img src="{{ $connection->profile_img }}" alt="{{ $connection->name }}" /></a>
					@endforeach
			</div>

		</div>

</div>
@stop
