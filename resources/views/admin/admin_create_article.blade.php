@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('ArticlesController@store') }}">
	{!!csrf_field()!!}
	@include ('partials.admin_create_article')
<button type="submit">Create</button>
</form>
@stop