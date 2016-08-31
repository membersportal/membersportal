<div class="form-group">
	<input type="text" class="form-control login" name="username" value="{{ old('username') }}" maxlength="32" placeholder="username" required>
	@include ('partials.error', ['value' => 'username'])
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