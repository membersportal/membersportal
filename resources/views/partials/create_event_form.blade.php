<div class="form-group">
	<label for="title">Event Title<span class="required">*</span></label>
	<input type="text" class="form-control" name="title" value="{{ old('title') }}" maxlength="75" required>
	@include ('partials.error', ['value' => 'title'])
</div>
<div class="form-group">
	<label for="from_date">From:<span class="required">*</span></label>
	<input type="date" class="form-control" name="from_date" value="{{ old('from_date') }}" required>
</div>
<div class="form-group">
	<label for="to_date">To:<span class="required">*</span></label>
	<input type="date" class="form-control" name="to_date" value="{{ old('to_date') }}" required>
</div>
<div class="form-group">
	<label for="desc">Event Description<span class="required">*</span></label>
	<textarea name="desc" maxlength="1000" rows="6" required>{{ old('desc') }}</textarea>
	@include ('partials.error', ['value' => 'desc'])
</div>
<div class="checkbox-inline">
	<label for="invite_only">
	<input type="checkbox" name="invite_only" value="True" required> Invite Only?<span class="required">*</span>
	</label>
</div>
<div class="checkbox-inline">
	<label for="rsvp_required">
	<input type="checkbox" name="rsvp_required" value="True" required> RSVP Required?<span class="required">*</span>
	</label>
</div>
<div class="form-group">
	<label for="url">Website</label>
	<p class="form_label_small">Please enter the full URL including http://</p>
	<p class="form_label_small">This link should enable members to read more detail regarding your event as well as RSVP.</p>
	<input type="url" class="form-control" name="url" value="{{ old('url') }}" placeholder="http://www.example.com">
	@include ('partials.error', ['value' => 'url'])
</div>
<div class="form-group">
	<label for="header_img">Event Image</label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="img" accept="image/*">
	@include ('partials.error', ['value' => 'img'])
</div>
