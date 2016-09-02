@extends('layouts.master')

@section('content')

<div class="row">
		<img src="/{{ $company->header_img}}" alt="header image" style="background-color: gray; height: 200px; width: 100%"/>
		<img src="/{{ $company->profile_img }}" alt="profile image" />
		<form method="POST" action="{{ action('ConnectionsController@store', ['id' => $company->id]) }}">
			{!! csrf_field() !!}
			<button type="submit" class="btn btn-primary">Connect</button>
		</form>

		<h1>{{ $company->name }}</h1>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

				<div class="contact">
					<ul>
						<li>{{ $contact->phone_no }}</li>
						<li>{{ $contact->address_line_1}}</li>
						<li>{{ $contact->city }}</li>
						<li>{{ $contact->state }}</li>
						<li>{{ $contact->zip }}</li>
					</ul>
				</div>

				<div class="home_panel">
					<h3 class="text-center">Events</h3>
					{{ dd($rfp) }}
					@foreach ($rfp as $key => $job)
						@if ($key < 3)
						<div id="accordion" role="tablist" aria-multiselectable="false">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading{{$key+1}}">
									<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->title }}
									</a>
									</h4>
									<p class="event_date_home">{{ $rfp->from_date->format('F j') }} - {{ $rfp->to_date->format('F j') }}</p>
								</div>
							<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
							{{ str_limit($rfp->desc, 100) }}<a href="#">see RFP</a>
							</div>
							</div>
						</div>
						@endif
					@endforeach
				</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
				<div class="about">
					<div class="left">
						<ul>
							@if($company->industry_id)
							<li>{{ $company->industry_id }}</li>
							@endif
							@if($company->woman_owned)
							<li>Woman-owned</li>
							@endif
							@if($company->family_owned)
							<li>Family-owned</li>
							@endif
						</ul>
					</div>
					<div class="right">
						<ul>
							@if($company->contractor)
							<li>Contractor</li>
							@endif
							@if($company->organization)
							<li>Organization</li>
							@endif
							<li>{{ $company->date_established }}</li>
						</ul>
					</div>
					<p>
						{{ $company->desc }}
					</p>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
			<div class="social_media">
				<a href="http://www.facebook.com/{{ $contact->facebook }}"><img src="facebook-dreamstale25.png" alt="facebook" /></a>
				<a href="http://www.instagram.com/{{ $contact->instagram }}"><img src="instagram-dreamstale43.png" alt="instagram" /></a>
				<a href="http://www.linkedin.com/in/{{ $contact->linkedin }}"><img src="linkedin-dreamstale45.png" alt="linkedin" /></a>
				<a href="http://plus.google.com/{{ $contact->google_plus }}"><img src="google+-dreamstale37.png" alt="google+" /></a>
			</div>
			<div class="home_panel">
				<h3 class="text-center">Events</h3>
				@foreach ($event as $key => $party)
					@if ($key < 3)
					<div id="accordion" role="tablist" aria-multiselectable="false">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading{{$key+1}}">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $party->title }}
								</a>
								</h4>
								<p class="event_date_home">{{ $party->from_date->format('F j') }} - {{ $party->to_date->format('F j') }}</p>
							</div>
						<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
						{{ str_limit($party->desc, 100) }}<a href="#">see event</a>
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

					<div class="connections">
						<h3 class="text-center">Connections</h3>
						@foreach($connection as $member)
						<h4>{{ $member->company2_id }}</h4>
						@endforeach
					</div>

		</div>

</div>

@stop
