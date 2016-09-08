<div class="form-group">
  <label for="project_title">Project Title<span class="required">*</span></label>
  <input type="text" class="form-control"name="project_title" value="{{ old('project_title') }}">
    @include ('partials.error', ['value' => 'project_title'])
</div>
<div class="form-group">
	<label for="deadline">Deadline<span class="required">*</span></label>
	<input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}" required>
</div>
<div class="form-group">
  <label for="contact_name">Contact Name<span class="required">*</span></label>
  <input type="text" class="form-control" name="contact_name" value="{{ old('contact_name') }}">
  @include ('partials.error', ['value' => 'contact_name'])
</div>
<div class="form-group">
  <label for="contact_department">Contact Department<span class="required">*</span></label>
  <input type="text" class="form-control" name="contact_department" value="{{ old('contact_department') }}">
  @include ('partials.error', ['value' => 'contact_department'])
</div>
<div class="form-group">
  <label for="contact_no">Contact Number<span class="required">*</span></label>
  <input type="tel" class="form-control" name="contact_no" value="{{ old('contact_no') }}">
  @include ('partials.error', ['value' => 'contact_no'])
</div>
<div class="form-group">
  <label for="project_scope">Project Scope<span class="required">*</span></label>
  <textarea name="project_scope" maxlength="2000" cols="12">{{ old('project_scope') }}</textarea>
  @include ('partials.error', ['value' => 'project_scope'])
</div>
<div class="form-group half_width">
	<label for="contract_from_date">Contract From<span class="required">*</span></label>
	<input type="date" class="form-control" name="contract_from_date" value="{{ old('contract_from_date') }}" required>
</div>
<div class="form-group half_width">
	<label for="contract_to_date">Contract To<span class="required">*</span></label>
	<input type="date" class="form-control" name="contract_to_date" value="{{ old('contract_to_date') }}" required>
</div>
<div class="form-group">
	<label for="url">RFP Link<span class="required">*</span></label>
	<p class="form_label_small">Enter the full URL including http:// &nbsp; Link readers to a site that will help provide more detail for the request or show examples of previous similar projects completed.</p>
	<input type="url" class="form-control" name="url" value="{{ old('url') }}" placeholder="http://www.example.com">
	@include ('partials.error', ['value' => 'url'])
</div>
