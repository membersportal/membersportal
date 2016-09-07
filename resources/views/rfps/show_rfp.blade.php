@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    <form action="#" method="get">
      <label for="submitted_rfps">My Submitted RFPs</label>
      <select class="form-control" id="submited_rfps" name="submitted_rfps">
        <option disabled selected label="Select"></option>



      </select>
      <a href="{{ action('RFPController@create') }}">Create New Request</a>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">

    <h1>{{ $rfp->project_title }}</h1>
    <h3>{{ $rfp->deadline }}</h3>
    <h3>RFP owner: <a href="{{ action('CompaniesController@show', $id = $rfp_owner->id) }}">{{ $rfp_owner->name }}</a></h3>
    <br>
    <p>
      {{ $rfp->contact_name }}
    </p>
    <p>
      {{ $rfp->contact_no }}
    </p>
    <p>
      {{ $rfp->contact_department }}
    </p>
    <br>
    <p>
      {{ $rfp->project_scope }}
    </p>
    <p>
      Contract from {{ $rfp->contract_from_date }} to {{ $rfp->contract_to_date }}
    </p>

    @if(Auth::user()->id == $rfp->company_id)
      <form action="{{ action('RFPController@edit', $id = $rfp->id) }}" method="get">
        <button type="submit">Edit</button>
      </form>
      <form action="{{ action('RFPController@destroy', $id = $rfp->id) }}" method="post">
        {!! csrf_field() !!}
        {{ method_field('DELETE') }}
        <button type="submit">Delete</button>
      </form>
    @endif
  </div>



  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

    <div class="panel_white">
      <h3 class="text-center">My RFPs</h3>
      @foreach ($users_rfps as $key => $rfp)
        @if ($key < 3)
        <div id="accordion" role="tablist" aria-multiselectable="false">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading{{$key+1}}">
              <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->project_title }}
              </a>
              </h4>
              <p class="event_date_home">Deadline for submission: {{ $rfp->deadline }} }}</p>
            </div>
            <div id="collapse{{$key+1}}" class="panel-collapse collapse event_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
            {{ str_limit($rfp->project_scope, 100) }}<a class="red_link" href="{{ action('RFPController@show', $id = $rfp->id) }}"> see request</a>
            </div>
          </div>
        </div>
        @endif
      @endforeach
      <a href="{{ action('RFPController@create') }}">Create New RFP</a>
      <div class="panel_green">
        <a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All RFPs</a>
      </div>
    </div>


  <div class="panel_white">
    <h3 class="text-center">Connection RFPs</h3>
    @foreach ($connections_rfps as $key => $rfp)
      @if ($key < 3)
      <div id="accordion" role="tablist" aria-multiselectable="false">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="heading{{$key+1}}">
            <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">{{ $rfp->project_title }}
            </a>
            </h4>
            <p class="event_date_home">Submission Deadline: {{ $rfp->deadline }}</p>
          </div>
          <div id="collapse{{$key+1}}" class="panel-collapse collapse rfp_desc_home" role="tabpanel" aria-labelledby="heading{{$key+1}}">
          {{ str_limit($rfp->project_scope, 100) }}<a class="red_link" href="#" target="_blank"> see event</a>
          </div>
        </div>
      </div>
      @endif
    @endforeach
    <div class="panel_green">
      <a class="green_bg" href="{{ action('RFPController@index') }}" alt="View All RFPs">See All RFPs</a>
    </div>
  </div>

</div>
</div>

@stop
