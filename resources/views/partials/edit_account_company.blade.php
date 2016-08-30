<div class="form-group">
	<label for="name">Company Name</label>
	<input type="text" class="form-control" name="name" value="{{ $company->name }}" maxlength="120" required>
		@include ('partials.error', ['value' => 'name'])
</div>
<p class="dropdown_label">Industry</p>
	<select class="form-control" name="industry" required>
		@foreach ($industries as $industry)
			<option value="{{ $industry->id }}" {{ $company->industry_id == '$industry->id' ? 'selected' : '' }}>{{ $industry }}</option>
	</select>
<div class="form-group">
	<p class="form_label_small">Don't forget to include keywords that describe your services.</p>
	<label for="desc">About</label>
	<textarea name="desc" maxlength="2000" rows="12">{{ $company->desc }}</textarea>
		@include ('partials.error', ['value' => 'desc'])
</div>
<div class="checkbox">
	<label for="female_owned">
		<input type="checkbox" name="female_owned" value="female_owned"> Woman-Owned
	</label>
</div>
<p class="dropdown_label">Business Type</p>
	<select class="form-control" id="business_type" name="business_type">
		<option value="freelance" {{ $company->freelance ?  'selected' : ''}}>Freelance</option>
		<option value="organization" {{ $company->organization ? 'selected'  : ''}}>Organization</option>
	</select>
<p class="dropdown_label">Number of Employees</p>
	<select class="form-control" id="size" name="size" disabled>
		<option value="fewer_than_10" {{ ($company->size == 'fewer_than_10') ? 'selected' : ''}}>Fewer Than 10</option>
		<option value="11-25" {{ ($company->size == '11-25') ? 'selected' : ''}}>11-25</option>
		<option value="26-50" {{ ($company->size == '26-50') ? 'selected' : ''}}>26-50</option>
		<option value="51-250" {{ ($company->size == '51-250') ? 'selected' : ''}}>51-250</option>
		<option value="251-500" {{ ($company->size == '251-500') ? 'selected' : ''}}>251-500</option>
		<option value="more_than_500" {{ ($company->size == 'more_than_500') ? 'selected' : ''}}>More Than 500</option>
	</select>
<p class="form_label">Date Established</p>
	<input type="date" class="form-control" name="date_established" value="{{ $company->date_established }}">
		@include ('partials.error', ['value' => 'date_established'])