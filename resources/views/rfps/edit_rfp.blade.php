@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    <form class="form-control" action="{{ action('RFPController@edit') }}" method="get">
      <label for="users_rfps">My RFPs</label>
      <select class="form-control" id="rfp_id" name="rfp_id">
        <option disabled selected label="Select"></option>
        @foreach ($usersRfps as $rfp)
          <option value="{{ $rfp->id }}">{{ $rfp->project_title }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

    <h1>Edit RFP</h1>
    @include('partials.edit_rfp')

  </div>


  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

    <form class="" action="{{ action('RFPController@edit') }}" method="get">
      <label for="users_rfps">My RFPs</label>
      <select class="form-control" id="rfp_id" name="rfp_id">
        <option disabled selected label="Select"></option>
        @foreach ($usersRfps as $rfp)
          <option value="{{ $rfp->id }}">{{ $rfp->title }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>
</div>

@stop
