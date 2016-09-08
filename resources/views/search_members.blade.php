@extends('layouts.master')
@section('content')
<div class="container">
	<h1 class="text-center">Search Members</h1>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
			<div id="search_filter">
				<form id="search_form" method="GET" action="{{ action('CompaniesController@searchMembers') }}">
					<div class="form-group">
		  				<input type="text" id="searchField" name="searchField" class="form-control search_form" placeholder="Search company name or keywords">
						@include ('partials.error', ['value' => 'searchField'])
						<select class="form-control search_form pull-right" id="industry_id" name="industry_id">
							<option disabled selected label="Select Industry"></option>
							@foreach ($industries as $industry)
								<option value="{{ $industry->id }}">{{ $industry->industry }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<div class="checkbox-inline">
							<label for="contractor">
							<input type="checkbox" id="contractor" name="contractor" value="contractor"> Contractor
							</label>
						</div>
						<div class="checkbox-inline">
							<label for="organization">
							<input type="checkbox" id="organization" name="organization" value="organization"> Organization
							</label>
						</div>
						<div class="checkbox-inline">
							<label for="contractor">
							<input type="checkbox" id="family_owned" name="family_owned" value="family_owned"> Family-Owned
							</label>
						</div>
						<div class="checkbox-inline">
							<label for="woman_owned">
							<input type="checkbox" id="woman_owned" name="woman_owned" value="woman_owned"> Woman-Owned
							</label>
						</div>
					<button type="submit" class="btn btn-primary pull-right">Map It!</button>
					</div>
	  			</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
			<div id="map"></div>
		</div>
	</div>
	<h1 class="text-center">Search Results</h1>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
			<ul id="nav_tabs" class="nav nav-tabs" role="tablist"></ul>
			<div id="tab_content" class="tab-content"></div>
			<div id="results"></div>
		</div>
	</div>
</div>
@stop

@section('bottom-script')
	@include('partials.member_search')
@stop