<div class="form-group">
	<label for="header_img">Upload New Header Image</label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="header_img" accept="image/*">
	@include ('partials.error', ['value' => 'header_img'])
</div>
<div class="form-group">
	<label for="profile_img">Upload New Profile Picture</label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="profile_img" accept="image/*">
	@include ('partials.error', ['value' => 'profile_img'])
</div>