<!-- full_name, title -->
	<div class="form-group half_width">
		<label for="full_name">First Name<span class="required">*</span></label>
		<input type="text" class="form-control" name="full_name" value="{{ $leader->full_name }}" placeholder="John Doe" maxlength="100" required>
		@include ('partials.error', ['value' => 'full_name'])
	</div>
	<div class="form-group half_width">
		<label for="title">Lask Name</label>
		<input type="text" class="form-control" name="title" value="{{ $leader->title }}" placeholder="COO" maxlength="100" required>
		@include ('partials.error', ['value' => 'title'])
	</div>

	<!-- Leader Image, Form -->
	<div class="text-center">
		<img class="img-thumbnail" src="{{ '/img/uploads/leaders/' . $leader->img }}">
	</div>
	<div class="form-group">
		<label for="img">Upload New Leader Picture</label>
		<p class="form_label_small">Maximum Size: 10MB</p>
		<input type="file" class="form-control" name="img" accept="image/*">
		@include ('partials.error', ['value' => 'img'])
	</div>
	<div class="form-group half_width">
		<label for="linkedin_url">LinkedIn</label>
		<p class="form_label_small">Enter the full URL including http://</p>
		<input type="url" class="form-control" name="linkedin_url" value="{{ $leader->linkedin_url }}" placeholder="https://www.linkedin.com/in/anthony-martinez">
		@include ('partials.error', ['value' => 'linkedin_url'])
	</div>
