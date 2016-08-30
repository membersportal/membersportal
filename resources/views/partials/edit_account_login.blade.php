<div class="form-group">
	<label for="first_name">First Name</label>
	<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" maxlength="100" required>
		@include ('partials.error', ['value' => 'first_name'])
</div>
<div class="form-group">
	<label for="last_name">Last Name</label>
	<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" maxlength="100" required>
		@include ('partials.error', ['value' => 'last_name'])
</div>
<div class="form-group">
	<label for="email">Email</label>
	<input type="email" class="form-control" name="email" value="{{ $user->email }}" maxlength="100" required>
		@include ('partials.error', ['value' => 'email'])
</div>
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="{{ $user->username }}" maxlength="32" required>
		@include ('partials.error', ['value' => 'username'])
</div>