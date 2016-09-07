@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    <div class="panel_white">
      <h3 class="text-center">My RFPs</h3>
      @foreach ($users_rfps as $key => $rfp)
        @if ($key < 3)
        <div id="accordion" role="tablist" aria-multiselectable="false">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading{{$key+1}}">
              <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->project_title }}
              </a>
              </h4>
              <p class="event_date_home">Deadline for submission: {{ $rfp->deadline }} }}</p>
            </div>
            <div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
            {{ str_limit($rfp->project_scope, 100) }}<a class="red_link" href="{{ action('RFPController@show', $id = $rfp->id) }}"> see request</a>
            </div>
          </div>
        </div>
        @endif
      @endforeach
      <a href="{{ action('RFPController@create') }}">Create New RFP</a>
      <div class="panel_green">
        <a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All RFPs</a>
      </div>
    </div>

  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
    @foreach($feed_content as $content)
      @if($content->company1_id)
        <h1>{{ $content->company1_id }}</h1>
      @elseif($content->project_title)
        <h2>{{ $content->project_title }}
      @elseif($content->title)
        <h3>{{ $content->title }}</h3>
      @endif
    @endforeach

  </div>


  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
    <div class="panel_white">
			<h3 class="text-center">My Events</h3>
			@foreach ($users_events as $key => $event)
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
						{{ str_limit($event->desc, 100) }}<a class="red_link" href="{{ action('EventsController@show', $id = $event->id) }}"> see event</a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
			<div class="panel_green">
				<a class="green_bg" href="{{ action('EventsController@index') }}" alt="View All Events">See All Events</a>
			</div>
		</div>


  </div>
</div>

@stop
