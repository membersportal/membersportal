<label for="social_media">Social Media</label>
@foreach ($social_media as $site => $account)
<select class="form-control" name="social_media">
	<option value="0">Select</option>
	<option value="twitter" {{ $social_media->twitter ? 'selected' : '' }}>Twitter</option>
	<option value="facebook" {{ $social_media->facebook ? 'selected' : '' }}>Facebook</option>
	<option value="instagram" {{ $social_media->instagram ? 'selected' : '' }}>Instagram</option>
	<option value="linkedin" {{ $social_media->linkedin ? 'selected' : '' }}>LinkedIn</option>
	<option value="google_plus" {{ $social_media->google_plus ? 'selected' : '' }}>Google Plus</option>
</select>
<div class="form-group">
	<label for="social_username">Username</label>
	<input type="text" class="form-control" name="social_username" value="{{ $account }}" maxlength="20">
	@include ('partials.error', ['value' => 'social_username'])
</div>
<form method="POST" action="{{ action('CompaniesController@deleteSocialMedia', $site) }}">
	{{ method_field('DELETE') }}
	{!! csrf_field() !!}
	<button type="submit" class="btn btn-danger">Delete</button>
</form>
