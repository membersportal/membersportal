<div class="form-group">
	<label for="first_name">First Name<span class="required">*</span></label>
	<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" maxlength="100" required>
	@include ('partials.error', ['value' => 'first_name'])
</div>
<div class="form-group">
	<label for="last_name">Last Name<span class="required">*</span></label>
	<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" maxlength="100" required>
	@include ('partials.error', ['value' => 'last_name'])
</div>
<div class="form-group">
	<label for="email">Email<span class="required">*</span></label>
	<input type="email" class="form-control" name="email" value="{{ $user->email }}" maxlength="100" required>
	@include ('partials.error', ['value' => 'email'])
</div>
<div class="form-group">
	<label for="username">Username<span class="required">*</span></label>
	<input type="text" class="form-control" name="username" value="{{ $user->username }}" maxlength="32" required>
	@include ('partials.error', ['value' => 'username'])
</div>
<div class="form-group">
	<label for="password">Password<span class="required">*</span></label>
	<p class="form_label_small">Enter a new password.</p>
	<input type="password" class="form-control" name="password" maxlength="32" required>
	@include ('partials.error', ['value' => 'password'])
</div>
<div class="form-group">
	<label for="password_confirmed">Confirm Password<span class="required">*</span></label>
	<input type="password" class="form-control" name="password_confirmation" maxlength="32" required>
	@include ('partials.error', ['value' => 'password_confirmation'])
</div>
