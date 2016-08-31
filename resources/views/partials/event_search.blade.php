<div class="form-group">
	<label for="name">Company Name</label>
	<input type="text" class="form-control" name="name" maxlength="120">
		@include ('partials.error', ['value' => 'name'])
</div>
<div class="form-group">
	<label for="title">Event Title</label>
	<input type="text" class="form-control" name="title" maxlength="120">
		@include ('partials.error', ['value' => 'title'])
</div>
<select class="form-control" name="industry_id">
	<option value="0">Select</option>
@foreach ($industries as $industry)
	<option value="{{ $industry->id }}">{{ $industry }}</option>
</select>