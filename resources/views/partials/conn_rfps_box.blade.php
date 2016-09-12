<h3 class="text-center">Connections' RFPs</h3>
@foreach ($company_rfps as $key => $company_rfp)
	<div id="accordion" role="tablist" aria-multiselectable="false">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading{{$key+10}}">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+10}}" aria-expanded="false" aria-controls="collapse{{$key+10}}">{{ $company_rfp->project_title }}</a>
				</h4>
				<p class="event_date_home">Deadline: {{ $company_rfp->deadline }}</p>
			</div>
			<div id="collapse{{$key+10}}" class="panel-collapse collapse rfp_desc_home" role="tabpanel" aria-labelledby="heading{{$key+10}}">{{ str_limit($company_rfp->project_scope, 100) }}
				<a class="red_link" href="#" target="_blank"> see event</a>
			</div>
		</div>
	</div>
@endforeach
<div class="panel_green">
	<a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All</a>
</div>