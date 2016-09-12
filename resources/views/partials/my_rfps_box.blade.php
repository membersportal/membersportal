<h3 class="text-center">My RFPs</h3>
@foreach ($users_rfps as $key => $rfp)
	@if ($key < 3)
	<div id="accordion" role="tablist" aria-multiselectable="false">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading{{$key+1}}">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->project_title }}</a>
				</h4>
				<p class="event_date_home">Deadline: {{ $rfp->deadline }}</p>
			</div>
			<div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">{{ str_limit($rfp->project_scope, 100) }}
				<a class="red_link" href="{{ action('RFPController@show', $id = $rfp->id) }}"> see request</a>
			</div>
		</div>
	</div>
	@endif
@endforeach
<div class="panel_green">
	<a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All RFPs</a>
</div>
@if(!Auth::user()->is_admin)
<div class="panel_beige">
	<a class="beige_bg" href="{{ action('RFPController@create') }}" alt="Create New RFP">Create New RFP</a>
</div>
@endif
