<div class="form-group">
	<label for="title">Title/Headline<span class="required">*</span></label>
	<input type="text" class="form-control" name="title" value="{{ $carousel->title }}" maxlength="50" required>
	@include ('partials.error', ['value' => 'title'])
</div>
<div class="form-group">
	<label for="desc">Description<span class="required">*</span></label>
	<textarea name="desc" maxlength="150" rows="2" required>{{ $carousel->desc }}</textarea>
	@include ('partials.error', ['value' => 'desc'])
</div>
<div class="form-group">
	<label for="url">URL<span class="required">*</span></label>
	<p class="form_label_small">Enter the full URL including http://</p>
	<input type="url" class="form-control" name="url" value="{{ $carousel->url }}" placeholder="http://www.example.com" required>
	@include ('partials.error', ['value' => 'url'])
</div>
<div class="form-group">
	<label for="header_img">Image<span class="required">*</span></label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="img" accept="image/*" required>
	@include ('partials.error', ['value' => 'img'])
</div>