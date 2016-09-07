@extends ('layouts.master')

@section ('content')

@foreach ($rfps as $rfp)
<form action="{{ action('RFPController@edit', ['id' => $rfp->id]) }}" method="post">
  <h1>{{ $rfp->project_title }}</h1>
  <button type="submit">Edit</button>
</form>
<form action="{{ action('RFPController@destroy', $id = $rfp->id) }}" method="post">
  {!! csrf_field() !!}
  {{ method_field('DELETE') }}
  <button type="submit" name="button">Delete RFP</button>
</form>

@endforeach

@stop
