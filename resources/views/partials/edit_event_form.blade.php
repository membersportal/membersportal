<div class="form-group">
	<label for="title">Event Title<span class="required">*</span></label>
	<input type="text" class="form-control" name="title" value="{{ $event->title }}" maxlength="75" required>
	@include ('partials.error', ['value' => 'title'])
</div>
<div class="form-group half_width">
	<label for="from_date">From:<span class="required">*</span></label>
	<input type="date" class="form-control" name="from_date" value="{{ $event->from_date }}" required>
</div>
<div class="form-group half_width">
	<label for="to_date">To:<span class="required">*</span></label>
	<input type="date" class="form-control" name="to_date" value="{{ $event->to_date }}" required>
</div>
<div class="form-group">
	<label for="desc">Event Description<span class="required">*</span></label>
	<textarea name="desc" maxlength="1000" rows="6" required>{{ $event->desc }}</textarea>
	@include ('partials.error', ['value' => 'desc'])
</div>
<div class="checkbox-inline">
	<label for="invite_only">
	<input type="checkbox" name="invite_only" value="1"> Invite Only
	</label>
</div>
<div class="checkbox-inline">
	<label for="rsvp_required">
	<input type="checkbox" name="rsvp_required" value="1"> RSVP Required
	</label>
</div>
<div class="form-group">
	<label for="url">Website<span class="required">*</span></label>
	<p class="form_label_small">Enter the full URL including http://&nbsp; This link should enable members to read more about your event as well as submit an RSVP.</p>
	<input type="url" class="form-control" name="url" value="{{ $event->url }}" placeholder="http://www.example.com" required>
	@include ('partials.error', ['value' => 'website'])
</div>
<div class="form-group">
	<label for="img">Event Image<span class="required">*</span></label>
	<p class="form_label_small">Maximum Size: 10MB</p>
	<input type="file" class="form-control" name="img" accept="image/*">
	@include ('partials.error', ['value' => 'img'])
</div>
