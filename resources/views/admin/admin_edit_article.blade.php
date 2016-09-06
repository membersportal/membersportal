@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('ArticlesController@update', ['id' => $articles->id]) }}">
	{!!csrf_field()!!}
	@include ('partials.admin_edit_article')
</form>

@stop