@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center space">Manage Articles</h1>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">	
			@include('partials.admin_dash_nav', ['home' => '', 'login' => '', 'contact' => '', 'articles' => 'active', 'carousels' => '', 'events' => '', 'rfps' => '', 'users' => ''] )
		</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
		<div class="panel_white articles">
			<div class="summary">
				<p class="text-center"><span class="strong">Total:</span> {{ count($articles) }} &nbsp;&nbsp;//&nbsp;&nbsp; <span class="strong">Last Article Added:</span> {{ $articles[0]->created_at->format('F j Y') }}</p>
				<a href="{{ action('ArticlesController@create') }}" class="create_button">Create New Article</a>
			</div>
			@foreach ($articles as $key => $article)
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
					<img class="img-responsive articles_grid" src="{{ '/img/articles/' . $article->img }}" alt="">
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					<h4 class="article_heading"><a href="{{ $article->url }}" target="_blank">{{ $article->heading }}</a><span class="article_date">&nbsp;&nbsp;//&nbsp;&nbsp;{{ $article->date }}</span></h4>
					@if ($article->subheading)
					<h5>{{ $article->subheading }}</h5>
					@endif
					<p class="article_desc">{{ $article->desc }}</p>
					<a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="edit_button pull-right">Edit</a>
					<form method="POST" action="{{ action('ArticlesController@destroy', ['id' => $article->id]) }}">
						{{ method_field('DELETE') }}
						{!! csrf_field() !!}
						<button class="btn btn-danger pull-right" type="submit">Delete</button>
					</form>
				</div>
			</div>
			@if (($key + 1) % $paginate != 0 || $key + 1 != count($articles))
				<hr class="wide">
			@endif
			@endforeach
		</div>
	</div>
</div>

@stop