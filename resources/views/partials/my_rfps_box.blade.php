<h3 class="text-center">My RFPs</h3>
	@foreach ($users_rfps as $key => $rfp)
		<ul class="rfps">
			<li class="rfps">
				<a class="red_link" href="{{ action('RFPController@show', $id = $rfp->id) }}">{{ $rfp->project_title }}</a>
			</li>
			<li class="small_gray"><span class="strong">Deadline:</span> {{ $rfp->deadline->format('F j, Y') }}</li>
			<li class="small_gray"><span class="strong">Contact:</span> {{ $rfp->contact_name }}</li>
		</ul>
		@endforeach
<div class="panel_green">
	<a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All RFPs</a>
</div>
@if(!Auth::user()->is_admin)
<div class="panel_beige">
	<a class="beige_bg" href="{{ action('RFPController@create') }}" alt="Create New RFP">Create New RFP</a>
</div>
@endif
