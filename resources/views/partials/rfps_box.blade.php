<h3 class="text-center">Requests for Proposals</h3>
	@foreach ($rfps as $key => $rfp)
		<ul class="rfps">
			<li class="rfps">
				<a class="red_link" href="{{ action('RFPController@show', $id = $rfp->id) }}">{{ $rfp->project_title }}</a>
			</li>
			<li class="small_gray"><span class="strong">Deadline:</span> {{ $rfp->deadline->format('F j, Y') }}</li>
			<li class="small_gray"><span class="strong">Contact:</span> {{ $rfp->contact_name }}</li>
		</ul>
@endforeach
<div class="panel_green">
	<a class="green_bg" href="{{ action('RFPController@index') }}" alt="Browse All RFPs">Browse All RFPs</a>
</div>