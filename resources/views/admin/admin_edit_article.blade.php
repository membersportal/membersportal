@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('ArticlesController@update', ['id' => $article->id]) }}">
	{!!csrf_field()!!}
	@include ('partials.admin_edit_article')
<button type="submit">Save</button>
</form>

@stop