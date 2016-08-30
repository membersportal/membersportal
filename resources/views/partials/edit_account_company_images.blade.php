<p class="form_label">Header Image</p>
	<p class="form_label_small">Maximum Size: 10MB</p>
<div class="form-group">
	<label for="header_img">Image</label>
	<input type="file" class="form-control" name="img" value="{{ $leader->header_img }}" accept="image/*">
		@include ('partials.error', ['value' => 'header_img'])
</div>
<p class="form_label">Profile Picture</p>
	<p class="form_label_small">Maximum Size: 10MB</p>
<div class="form-group">
	<label for="profile_img">Image</label>
	<input type="file" class="form-control" name="img" value="{{ $leader->profile_img }}" accept="image/*">
		@include ('partials.error', ['value' => 'profile_img'])
</div>