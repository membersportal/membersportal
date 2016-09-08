<div class="form-group">
	<label for="twitter half_width">Twitter</label>
		<p class="form_label_small">This username will be used to produce a Twitter feed.</p>
		<input class="form-control" type="text" name="twitter" value="{{ old('twitter') }}" maxlength="20" placeholder="Username Only">
	</label>
</div>
<div class="social_media_edit">
	<p class="blue">For Facebook, Instagram, LinkedIn and Google Plus, enter the full URL.</p>
	<div class="form-group half_width">
		<label for="facebook">Facebook</label>
		<input class="form-control" type="text" maxlength="200" name="facebook" value="{{ old('facebook') }}">
	</div>
	<div class="form-group half_width">
		<label for="instagram">Instagram</label>
		<input class="form-control" type="text" maxlength="200" name="instagram" value="{{ old('instagram') }}">
	</div>
	<div class="form-group half_width">
		<label for="linkedin">LinkedIn</label>
		<input class="form-control" type="text" maxlength="200" name="linkedin" value="{{ old('linkedin') }}">
	</div>
	<div class="form-group half_width">
		<label for="google_plus">Google Plus</label>
		<input class="form-control" type="text" maxlength="200" name="google_plus" value="{{ old('google_plus') }}">
	</div>
</div>
