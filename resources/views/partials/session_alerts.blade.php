@if (session()->has('SUCCESS_MESSAGE'))
	<div class="alert alert-success">{{ session('SUCCESS_MESSAGE') }}</div>
@endif
@if (session()->has('ERROR_MESSAGE'))
	<div class="alert alert-danger">{{ session('ERROR_MESSAGE') }}</div>
@endif