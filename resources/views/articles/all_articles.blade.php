@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xl-offset-2">
			<h1>All Articles</h1>
			<div class="main_panel">
			@foreach ($articles as $article)
				<a href="{{ $article->url }}">
					<img class="img-responsive articles_full" src="{{ '/img/articles/' . $article->img }}" alt="{{ $article->heading }}">
				</a>
				<h4 class="article_heading_full">{{ $article->heading }}</h4>
				<p><span class="article_date">Posted: {{ $article->date->format('M j Y \a\t H:ma') }}</span></p>
				@if ($article->subheading)
				<h5>{{ $article->subheading }}</h5>
				@endif
				<p class="article_desc">{{ $article->desc }}
					<a class="red_link" href="{{ $article->url }}"> &nbsp;&nbsp;Continue reading ></a>
				</p>
			@endforeach
			</div>
		</div>
	</div>
</div>

<div class="text-center">
{!! $articles->render() !!}
</div>

@stop