@extends ('layouts.master')

@section ('content')

@foreach ($articles as $article)
<h1><a href="{{ action('ArticlesController@edit', ['request' => $article->id]) }}">{{ $article->heading }}</a></h1>

@endforeach


@stop