<div class="form-group">
	<input type="text" class="form-control login" name="email" value="{{ old('email') }}" maxlength="32" placeholder="email" required>
	@include ('partials.error', ['value' => 'email'])
</div>
<div class="form-group">
	<input type="password" class="form-control login" name="password" placeholder="password" maxlength="60" required>
	@include ('partials.error', ['value' => 'password'])
</div>
<div class="checkbox-inline checkbox_login">
	<label class="login">
		<input class="login_checkbox" type="checkbox"> Remember Me
	</label>
</div>