<!-- Company Name, Industry, About -->
<div class="form-group">
	<label for="name">Company Name<span class="required">*</span></label>
	<input type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="120" required>
		@include ('partials.error', ['value' => 'name'])
</div>
<label for="industry_id">Industry<span class="required">*</span></label>
<select class="form-control" name="industry_id" required>
	<option disabled value="0">Select Industry</option>
@foreach ($industries as $industry)
	<option value="{{ $industry->id }}">{{ $industry->industry }}</option>
@endforeach
</select>
<div class="form-group">
	<label for="desc">About</label>
	<p class="form_label_small">Don't forget to include keywords that describe your services.</p>
	<textarea name="desc" maxlength="2000" rows="12">{{ old('desc') }}</textarea>
	@include ('partials.error', ['value' => 'desc'])
</div>

<!-- Characteristics -->
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

<!-- Type, Size, Date Established -->
<label for="business_type">Business Type</label>
<select class="form-control" id="business_type" name="business_type">
	<option disabled value="0">Select</option>
	<option value="contractor">Contractor</option>
	<option value="organization">Organization</option>
</select>
<label for="size">Number of Employees</label>
<select class="form-control" id="size" name="size" disabled>
	<option value="0">Select</option>
	<option value="fewer_than_10">Fewer Than 10</option>
	<option value="11-25">11-25</option>
	<option value="26-50">26-50</option>
	<option value="51-250">51-250</option>
	<option value="251-500">251-500</option>
	<option value="more_than_500">More Than 500</option>
</select>
<div class="form-group">
	<label for="date_established">Date Established</label>
	<input type="date" class="form-control" name="date_established" value="">
</div>
@include ('partials.error', ['value' => 'date_established'])
