@extends('layouts.master')

@section('content')
<div class="container">
	<h1 class="text-center">Create Leaders</h1>
	<p class="text-center"><span class="required">*</span> Required Field</p>
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xl-offset-1 edit_nav">
		@include('partials.edit_account_nav', ['login' => '', 'company' => '', 'contact' => '', 'leaders' => 'active'])
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
    <a href="{{ action('LeadersController@create') }}">Create Leader</a>
      @foreach($leaders as $leader)
      <h1>{{ $leader->full_name }}</h1>
			<h2>{{ $leader->title }}</h2>
      <a href="{{ action('LeadersController@edit', ['id' => $leader->id]) }}" class="edit_button pull-right">Edit</a>
      <form method="POST" action="{{ action('LeadersController@destroy', ['id' => $leader->id]) }}">
        {{ method_field('DELETE') }}
        {!! csrf_field() !!}
        <button class="btn btn-danger pull-right" type="submit">Delete</button>
      </form>
      @endforeach
	</div>
</div>
@stop
