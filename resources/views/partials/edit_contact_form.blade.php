<!-- Company Address -->
<div class="form-group">
	<label for="address_line_1">Company Address<span class="required">*</span></label>
	<input type="text" class="form-control" name="address_line_1" value="{{ $contact->address_line_1 }}" placeholder="Address Line 1" maxlength="50" required>
	@include ('partials.error', ['value' => 'address_line_1'])
	<input type="text" class="form-control included" name="address_line_2" value="{{ $contact->address_line_2 }}" placeholder="Address Line 2" maxlength="50">
	@include ('partials.error', ['value' => 'address_line_2'])
	<input type="text" class="form-control included" name="address_line_3" value="{{ $contact->address_line_3 }}" placeholder="Address Line 3" maxlength="50">
	@include ('partials.error', ['value' => 'address_line_3'])
</div>

<!-- City, State, Zip, Country -->
<div class="interior_form">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
		<div class="form-group">
			<label for="city">City<span class="required">*</span></label>
			<input type="text" class="form-control" name="city" value="{{ $contact->city }}" maxlength="50" required>
			@include ('partials.error', ['value' => 'city'])
		</div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
		@include ('partials.state', ['contact' => $contact])
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
		<div class="form-group">
			<label for="zip">Zip<span class="required">*</span></label>
			<input type="number" class="form-control" name="zip" value="{{ $contact->zip }}" placeholder="10101" maxlength="5" required>
			@include ('partials.error', ['value' => 'zip'])
			<input type="hidden" name="country" value="USA">
		</div>
	</div>
</div>

<!-- Phone, Website -->
<div class="form-group half_width">
	<label for="phone_no">Phone Number<span class="required">*</span></label>
	<p class="form_label_small">Enter numbers only; no spaces or dashes.</p>
	<input type="number" class="form-control" name="phone_no" value="{{ $contact->phone_no }}" placeholder="5554567890" maxlength="10" required>
	@include ('partials.error', ['value' => 'phone_no'])
</div>
<div class="form-group half_width">
	<label for="website">Website</label>
	<p class="form_label_small">Enter the full URL including http://</p>
	<input type="url" class="form-control" name="website" value="{{ $contact->website }}" placeholder="http://www.example.com">
	@include ('partials.error', ['value' => 'website'])
</div>
<div class="form-group">
	<label for="twitter half_width">Twitter</label>
		<p class="form_label_small">This username will be used to produce the Twitter feed on the user profile page.</p>
		<input class="form-control" type="text" name="twitter" value="{{ $contact->twitter }}" maxlength="20" placeholder="Username Only">
	</label>
</div>
<div class="social_media_edit">
	<p class="blue">For Facebook, Instagram, LinkedIn and Google Plus, enter the full URL.</p>
	<div class="form-group half_width">
		<label for="facebook">Facebook</label>
		<input class="form-control" type="text" maxlength="200" name="facebook" value="{{ $contact->facebook }}">
	</div>
	<div class="form-group half_width">
		<label for="instagram">Instagram</label>
		<input class="form-control" type="text" maxlength="200" name="instagram" value="{{ $contact->instagram }}">
	</div>
	<div class="form-group half_width">
		<label for="linkedin">LinkedIn</label>
		<input class="form-control" type="text" maxlength="200" name="linkedin" value="{{ $contact->linkedin }}">
	</div>
	<div class="form-group half_width">
		<label for="google_plus">Google Plus</label>
		<input class="form-control" type="text" maxlength="200" name="google_plus" value="{{ $contact->google_plus }}">
	</div>
</div>