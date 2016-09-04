@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 left_home">

    <form class="form-control" action="#" method="get">
      <label for="users_rsvps">My RSVPs</label>
      <select class="form-control" id="rsvp_id" name="rsvp_id">
        <option disabled selected label="Select"></option>



      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>


  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 center_home">
    @foreach($events as $event)
      <h5>$event->title</h5>
    @endforeach
  </div>


  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 right_home">

    <form class="" action="{{ action('EventsController@edit') }}" method="get">
      <label for="users_events">My Events</label>
      <select class="form-control" id="event_id" name="event_id">
        <option disabled selected label="Select"></option>
        @foreach ($usersEvents as $event)
          <option value="{{ $event->id }}">{{ $event->title }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-default">Edit</button>
    </form>

  </div>
</div>

@stop
