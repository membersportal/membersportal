@foreach ($rfps as $key => $rfp)
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h4 class="rfp_heading"><a href="{{ action('RFPController@show', $id = $rfp->id) }}">{{ $rfp->project_title }}</a></h4>
			<p class="rfp_dates">Deadline: <span class="rfp_date">{{ $rfp->deadline }}</span></p>&nbsp;&nbsp; || &nbsp;&nbsp;
			<p class="rfp_dates">Project Dates: <span class="rfp_date">{{ $rfp->contract_from_date }} - {{ $rfp->contract_to_date }}</span></p>
			<p class="rfp_contact">Contact: <span class="rfp_contact_detail">{{ $rfp->contact_name }}</span>&nbsp;&nbsp; || &nbsp;&nbsp;Dept: <span class="rfp_contact_detail">{{ $rfp->contact_department }}</span>&nbsp;&nbsp; || &nbsp;&nbsp;Phone:</span> <span class="rfp_contact_detail">{{ $rfp->contact_no }}</span></p>
			<p class="rfp_desc">{{ str_limit($rfp->project_scope, 300) }}<a class="red_link" href="{{ action('RFPController@show', ['id' => $rfp->id]) }}" alt="{{ $rfp->project_title }}">&nbsp;&nbsp;Read full RFP</a></p>
		</div>
	</div>
	@if ($rfp != $rfps[(count($rfps) - 1)])
		<hr class="wide">
	@endif
@endforeach