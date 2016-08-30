<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="{{ old('username') }}" maxlength="32" required autofocus>
		@include ('partials.error', ['value' => 'username'])
</div>
<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" maxlength="60" required>
		@include ('partials.error', ['value' => 'password'])
</div>