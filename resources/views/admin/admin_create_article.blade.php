@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('ArticlesController@store') }}" enctype="multipart/form-data">
	{!!csrf_field()!!}
	@include ('partials.admin_create_article')
<button type="submit">Create</button>
</form>
@stop
