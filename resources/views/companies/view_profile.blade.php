@extends('layouts.master')

@section('content')
<form method="POST" action="{{ action('ConnectionsController@store', ['id' => $company->id]) }}">
	{!! csrf_field() !!}
	<button type="submit" class="btn btn-primary">Connect</button>
</form>

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">
	<h3 class="text-center">Events</h3>
	<a class="twitter-timeline"  href="https://twitter.com/search?q=from%3A{{ $contact->twitter }}" data-widget-id="771057747718582272" data-screen-name="{{ $contact->twitter }}">Tweets about </a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

@stop