<!-- Company Name, Industry, About -->
<div class="form-group">
	<label for="name">Company Name<span class="required">*</span></label>
	<input type="text" class="form-control" name="name" value="{{ $company->name }}" maxlength="120" required>
		@include ('partials.error', ['value' => 'name'])
</div>
<div class="form-group half_width">
	<label for="industry_id">Industry<span class="required">*</span></label>
	<select class="form-control" name="industry_id" required>
		<option value="0">Select</option>
	@foreach ($industries as $industry)
		<option value="{{ $industry->id }}" {{ $company->industry->industry == $industry->industry ? 'selected' : '' }}>{{ $industry->industry }}</option>
	@endforeach
	</select>
</div>
<div class="form-group half_width">
	<label for="business_type">Business Type<span class="required">*</span></label>
	<select class="form-control" id="business_type" name="business_type" required>
		<option value="0">Select</option>
		<option value="contractor" {{ $company->contractor ?  'selected' : ''}}>Contractor</option>
		<option value="organization" {{ $company->organization ? 'selected'  : ''}}>Organization</option>
	</select>
</div>
<div class="form-group">
	<label for="desc">About</label>
	<p class="form_label_small">Don't forget to include keywords that describe your services.</p>
	<textarea name="desc" maxlength="2000" rows="12">{{ $company->desc }}</textarea>
	@include ('partials.error', ['value' => 'desc'])
</div>

<!-- Characteristics -->
<div class="checkboxes">
	<div class="checkbox-inline">
		<label for="family_owned">
		<input type="checkbox" name="family_owned" value="family_owned"> Family-Owned
		</label>
	</div>
	<div class="checkbox-inline">
		<label for="woman_owned">
		<input type="checkbox" name="woman_owned" value="woman_owned"> Woman-Owned
		</label>
	</div>
</div>

<!-- Size, Date Established -->
<div class="form-group half_width">
	<label for="size">Number of Employees</label>
	<select class="form-control" id="size" name="size">
		<option value="0">Select</option>
		<option value="fewer_than_10" {{ ($company->size == 'fewer_than_10') ? 'selected' : ''}}>Fewer Than 10</option>
		<option value="11-25" {{ ($company->size == '11-25') ? 'selected' : ''}}>11-25</option>
		<option value="26-50" {{ ($company->size == '26-50') ? 'selected' : ''}}>26-50</option>
		<option value="51-250" {{ ($company->size == '51-250') ? 'selected' : ''}}>51-250</option>
		<option value="251-500" {{ ($company->size == '251-500') ? 'selected' : ''}}>251-500</option>
		<option value="more_than_500" {{ ($company->size == 'more_than_500') ? 'selected' : ''}}>More Than 500</option>
	</select>
</div>
<div class="form-group half_width">
	<label for="date_established">Date Established</label>
	<input type="date" class="form-control" name="date_established" value="{{ $company->date_established }}">
</div>
@include ('partials.error', ['value' => 'date_established'])