<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="{{ old('username') }}" maxlength="32" required autofocus>
		@if ($errors->has('username'))
			{!! $errors->first('username', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" maxlength="60" required>
		@if ($errors->has('password'))
			{!! $errors->first('password', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>