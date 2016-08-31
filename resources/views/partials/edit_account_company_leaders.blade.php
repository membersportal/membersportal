<div class="form-group">
	<label for="full_name">Full Name</label>
	<input type="text" id="full_name" class="form-control" name="full_name" value="{{ $leader->full_name }}" maxlength="100">
	@include ('partials.error', ['value' => 'full_name'])
</div>
<div class="form-group">
	<label for="title">Title</label>
	<input type="text" class="form-control" name="title" value="{{ $leader->title }}" maxlength="100">
	@include ('partials.error', ['value' => 'title'])
</div>
<div class="form-group">
	<label for="linkedin_url">LinkedIn URL</label>
	<input type="url" class="form-control" name="linkedin_url" value="{{ $leader->linkedin_url }}">
	@include ('partials.error', ['value' => 'linkedin_url'])
</div>
<div class="form-group">
	<label for="linkedin_url">Upload New Headshot</label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="img" accept="image/*">
	@include ('partials.error', ['value' => 'img'])
</div>