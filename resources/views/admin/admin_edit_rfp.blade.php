@extends ('layouts.master')

@section ('content')
<h1>Edit RFP</h1>
<form method="POST" action="{{ action('RFPController@update', ['id' => $rfp->id]) }}">
  {!! csrf_field() !!}
  @include('partials.admin_edit_rfp_form')
  <button type="submit">Save</button>
</form>


@stop
