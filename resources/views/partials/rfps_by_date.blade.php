@foreach ($rfps as $key => $rfp)
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h4 class="rfp_heading"><a href="{{ action('RFPController@show', $id = $rfp->id) }}"><span class="strong">{{ $rfp->project_title }}</span></a></h4>

			<p class="rfp_dates">
				<span class="strong deadline">DEADLINE:</span>
				{{ $rfp->deadline->format('F j, Y') }}
			</p>

			<p class="rfp_dates">
				<span class="strong">Contract:</span> 
				{{ $rfp->contract_from_date->format('F j, Y') }} - {{ $rfp->contract_to_date->format('F j, Y') }}
			</p>
			
			<p class="rfp_contact">
				<span class="strong">Contact:</span> 
				{{ $rfp->contact_name }}</span>
				&nbsp; // &nbsp;
				<span class="strong">Phone:</span>
				{{ '(' . substr($rfp->contact_no, 0, 3) . ') ' . substr($rfp->contact_no, 3, 3) . '-' . substr($rfp->contact_no, 6, 4) }}
			</p>
			
			<p class="rfp_desc">{{ str_limit($rfp->project_scope, 300) }}<a class="red_link" href="{{ action('RFPController@show', ['id' => $rfp->id]) }}" alt="{{ $rfp->project_title }}">&nbsp;&nbsp;full ></a></p>
		</div>
	</div>
	@if ($rfp != $rfps[(count($rfps) - 1)])
		<hr class="wide">
	@endif
@endforeach