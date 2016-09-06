@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('ArticlesController@update', ['id' => $article->id]) }}">
	{!!csrf_field()!!}
	@include ('partials.admin_edit_article')
<button type="submit">Save</button><a href="{{ action('ArticlesController@destroy', ['id' => $article->id]) }}">Delete</a>
</form>

@stop