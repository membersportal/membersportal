@extends('layouts.master')
@section('content')
	<h1 class="text-center">Search Members</h1>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
		<div id="map">
			@include('partials.member_search')
		</div>
			<div id="search_filter">
				<form method="GET" action="{{ action('CompaniesController@searchMembers') }}">
					<div class="form-group">
		  				<input type="text" name="searchField" class="form-control" placeholder="Search company name, description or keywords">
					</div>
					@include ('partials.error', ['value' => 'searchField'])
					<label for="industry_id">Industry</label>
					<select class="form-control" name="industry_id">
						<option disabled selected label="Select"></option>
						@foreach ($industries as $industry)
							<option value="{{ $industry->id }}">{{ $industry->industry }}</option>
						@endforeach
					</select>
					<div class="checkbox-inline">
						<label for="contractor">
						<input type="checkbox" name="contractor" value="contractor"> Contractor
						</label>
					</div>
					<div class="checkbox-inline">
						<label for="organization">
						<input type="checkbox" name="organization" value="organization"> Organization
						</label>
					</div>
					<div class="checkbox-inline">
						<label for="contractor">
						<input type="checkbox" name="family_owned" value="family_owned"> Family-Owned
						</label>
					</div>
					<div class="checkbox-inline">
						<label for="woman_owned">
						<input type="checkbox" name="woman_owned" value="woman_owned"> Woman-Owned
						</label>
					</div>
					<button type="submit" class="btn btn-default">Map It!</button>
	  			</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
			<div class="row">
				@foreach ($results as $company)
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<a href="{{ action('CompaniesController@show', $company->id) }}">
									<img class="img-circle center-block img-responsive" src="/img/profile_photo_template.png">
								</a>
							</div>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
								<p class="company_name">{{ $company->name }}</p>
								<p class="industry_name">{{ $company->industry->industry }}</p>
								<p class="company_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<div id="map"></div>
	<div class="text-center">
		{!! $results->render() !!}
	</div>
@stop
