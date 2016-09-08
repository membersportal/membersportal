<div class="form-group half_width">
	<label for="first_name">First Name<span class="required">*</span></label>
	<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" maxlength="100" required>
	@include ('partials.error', ['value' => 'first_name'])
</div>
<div class="form-group half_width">
	<label for="last_name">Last Name<span class="required">*</span></label>
	<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" maxlength="100" required>
	@include ('partials.error', ['value' => 'last_name'])
</div>
<div class="form-group">
	<label for="email">Email<span class="required">*</span></label>
	<input type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="100" required>
	@include ('partials.error', ['value' => 'email'])
</div>
<div class="form-group">
	<label for="username">Username<span class="required">*</span></label>
	<input type="text" class="form-control" name="username" value="{{ old('username') }}" maxlength="32" required>
	@include ('partials.error', ['value' => 'username'])
</div>
<div class="form-group">
	<label for="password">Password<span class="required">*</span></label>
	<p class="form_label_small">Suggestion: use the company name as a temporary password.</p>
	<input type="text" class="form-control" name="password" maxlength="32" required>
	@include ('partials.error', ['value' => 'password'])
</div>
<div class="form-group">
	<label for="password_confirmation">Confirm Password<span class="required">*</span></label>
	<input type="text" class="form-control" name="password_confirmation" maxlength="32" required>
	@include ('partials.error', ['value' => 'password_confirmation'])
</div>
