<div class="form-group">
	<label for="heading">Heading<span class="required">*</span></label>
	<input type="text" class="form-control" name="heading" value="{{ old('heading') }}" maxlength="250" required>
	@include ('partials.error', ['value' => 'heading'])
</div>
<div class="form-group">
	<label for="subheading">Subheading<span class="required">*</span></label>
	<input type="text" class="form-control" name="title" value="{{ old('subheading') }}" maxlength="250" required>
	@include ('partials.error', ['value' => 'subheading'])
</div>
<div class="form-group">
	<label for="desc">Description<span class="required">*</span></label>
	<input type="text" class="form-control" name="title" value="{{ old('desc') }}" maxlength="500" required>
	@include ('partials.error', ['value' => 'desc'])
</div>
<div class="form-group">
	<label for="img">Upload An Image</label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="img" accept="image/*">
	@include ('partials.error', ['value' => 'img'])
</div>
<div class="form-group">
	<label for="url">URL<span class="required">*</span></label>
	<input type="text" class="form-control" name="url" value="{{ old('url') }}" maxlength="250" required>
	@include ('partials.error', ['value' => 'url'])
</div>
