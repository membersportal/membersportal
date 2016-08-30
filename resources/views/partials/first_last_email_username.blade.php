<div class="form-group">
	<label for="first_name">First Name</label>
	<input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}">
		@if ($errors->has('first_name'))
			{!! $errors->first('first_name', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<div class="form-group">
	<label for="last_name">Last Name</label>
	<input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}">
		@if ($errors->has('last_name'))
			{!! $errors->first('last_name', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>
<div class="form-group">
	<label for="email">Email</label>
	<input type="email" class="form-control" name="email" value="{{ old('email')}}">
		@if ($errors->has('email'))
			{!! $errors->first('email', '<span class="help-block alert alert-warning">:message</span>') !!}
		@endif
</div>