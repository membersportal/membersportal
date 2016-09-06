@extends ('layouts.master')

@section ('content')

<form method="POST" action="{{ action('RFPController@update', ['id' => $rfp->id]) }}">
  {!!csrf_field()!!}
  @include('partials.admin_edit_rfp_form')
  <button type="submit">Save</button>
</form>

@stop