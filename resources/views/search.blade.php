@extends('layouts.master')
@section('content')
	<h1 class="text-center">Search Members</h1>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
			<div id="search_filter">
				<form method="GET" action="{{ action('CompaniesController@searchMembers') }}">
					{!! csrf_field() !!}
					<div class="form-group">
		  				<input type="text" name="searchField" class="form-control" placeholder="Company name, description or keywords">
					</div>
					@include ('partials.error', ['value' => 'searchField'])
					<label for="industry_id">Industry<span class="required">*</span></label>
					<select class="form-control" name="industry_id" required>
						<option value="0">Select</option>
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
					<button type="submit" class="btn btn-default">Submit</button>
	  			</form>
			</div>
		</div>
	<div id="map"></div>
@stop