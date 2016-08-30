<p class="form_label">Company Address</p>
	<div class="form-group">
		<input type="text" class="form-control" name="address_line_1" value="{{ $contact->address_line_1 }}" placeholder="Address Line 1" maxlength="50">
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
<p class="form_label">City</p>
	<div class="form-group">
		<input type="text" class="form-control" name="city" value="{{ $contact->city }}" placeholder="City" maxlength="50">
			@include ('partials.error', ['value' => 'city'])
	</div>
@include ('partials.state', ['contact' => $contact])
<input type="hidden" name="state" value="USA">
<label for="phone_no">Phone Number</label>
	<p class="form_label_small">Please enter numbers only; no spaces or dashes.</p>
	<div class="form-group">
		<input type="number" class="form-control" name="phone_no" value="{{ $contact->phone_no }}" placeholder="5554567890">
		@include ('partials.error', ['value' => 'phone_no'])
	</div>
<label for="website">Website</label>
	<p class="form_label_small">Please enter the full URL including http://</p>
	<div class="form-group">
		<input type="text" class="form-control" name="website" value="{{ $contact->website }}" maxlength="100" placeholder="http://www.example.com">
			@include ('partials.error', ['value' => 'website'])
	</div>
<p class="form_label">Social Media</p>
	<select class="form-control" name="social_media">
		<option value="twitter">Twitter</option>
		<option value="facebook">Facebook</option>
		<option value="instagram">Instagram</option>
		<option value="linkedin">LinkedIn</option>
		<option value="google_plus">Google Plus</option>
	</select>
	<label for="social_user">Username</label>
	<input type="text" class="form-control" name="social_username" value="{{ $contact->address_line_1 }}" maxlength="20"> 