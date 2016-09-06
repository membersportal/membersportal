<!-- Org Contact Name and Address -->
<div class="form-group">
	<label for="address_line_1">Company Address<span class="required">*</span></label>
	<input type="text" class="form-control" name="address_line_1" value="{{ $contact->address_line_1 }}" placeholder="Address Line 1" maxlength="50" required>
	@include ('partials.error', ['value' => 'address_line_1'])
</div>
<div class="form-group">
	<input type="text" class="form-control" name="address_line_2" value="{{ $contact->address_line_2 }}" placeholder="Address Line 2" maxlength="50">
	@include ('partials.error', ['value' => 'address_line_2'])
</div>
<div class="form-group">
	<input type="text" class="form-control" name="address_line_3" value="{{ $contact->address_line_3 }}" placeholder="Address Line 3" maxlength="50">
	@include ('partials.error', ['value' => 'address_line_3'])
</div>


<!-- Org City, State, Zip, Country -->
<div class="form-group">
	<label for="city">City<span class="required">*</span></label>
	<input type="text" class="form-control" name="city" value="{{ $contact->city }}" maxlength="50" required>
	@include ('partials.error', ['value' => 'city'])
</div>
@include ('partials.state', ['contact' => $contact])
<div class="form-group">
	<label for="zip">Zip<span class="required">*</span></label>
	<input type="number" class="form-control" name="zip" value="{{ $contact->zip }}" placeholder="10101" maxlength="5" required>
	@include ('partials.error', ['value' => 'zip'])
</div>
<input type="hidden" name="country" value="USA">

<!-- Org Phone, Website -->
<div class="form-group">
	<label for="phone_no">Phone Number<span class="required">*</span></label>
	<p class="form_label_small">Please enter numbers only; no spaces or dashes.</p>
	<input type="number" class="form-control" name="phone_no" value="{{ $contact->phone_no }}" placeholder="5554567890" maxlength="10" required>
	@include ('partials.error', ['value' => 'phone_no'])
</div>
<div class="form-group">
	<label for="website">Website</label>
	<p class="form_label_small">Please enter the full URL including http://</p>
	<input type="url" class="form-control" name="website" value="{{ $contact->website }}" placeholder="http://www.example.com">
	@include ('partials.error', ['value' => 'website'])
</div>
<div class="form-group">
	<label for="social_media">Social Media</label>
	<p>Please enter your username.</p>
	<input type="text" name="twitter" value="{{ $contact->twitter }}">
	<input type="text" name="facebook" value="{{ $contact->facebook }}">
	<input type="text" name="instagram" value="{{ $contact->instagram }}">
	<input type="text" name="linkedin" value="{{ $contact->linkedin }}">
	<input type="text" name="google_plus" value="{{ $contact->google_plus }}">
</div>
