<div class="form-group">
	<label for="first_name">First Name</label>
	<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" maxlength="100" required>
		@if ($errors->has('first_name'))
			{!! $errors->first('first_name', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<div class="form-group">
	<label for="last_name">Last Name</label>
	<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" maxlength="100" required>
		@if ($errors->has('last_name'))
			{!! $errors->first('last_name', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<div class="form-group">
	<label for="email">Email</label>
	<input type="email" class="form-control" name="email" value="{{ $user->email }}" maxlength="100" required>
		@if ($errors->has('email'))
			{!! $errors->first('email', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="{{ $user->username }}" maxlength="32" required>
		@if ($errors->has('username'))
			{!! $errors->first('username', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>