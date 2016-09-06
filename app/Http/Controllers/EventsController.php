<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Company;


class EventsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$events = Event::all()->sortBy('from_date');
		$user = Auth::user()->id;
		$connections = Company::find($user)->companies;
		$connections_events = Event::dashboardEvents($connections)->get();
		$users_events = Event::usersEvents($user)->get();
		$data = compact('events', 'users_events', 'connections_events');
		return view('events.all_events')->with($data);
	}

	public function show()
	{
		//
	}

	public function searchEvents(Request $request)
	{
	  $results = Event::searchEvents($request);
	  $data = compact('results');
		return view('events.search')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$user = Auth::user();
		$user_company = Company::find($user->id);
		$connections = $user_company->companies;
		$connections_events = Event::dashboardEvents($connections)->get();
		$users_events = Event::usersEvents($user)->get();
		$data = compact('users_events', 'connections_events');
		if ($user->is_admin){
			return view('admin.admin_create_event');
		} else {
			return view('events.create_event')->with($data);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
	  $event = new Event();
	  return $this->validateAndSave($event, $request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id)
	{
		$user = Auth::user();
		if ($user->is_admin) {
			$event = Event::findOrFail($id);
			$data = compact('event');
		  	return view('admin.admin_edit_event')->with($data);
		} else {
	  		$event = Event::findOrFail($request->event_id);
			$connections = Company::find($user->id)->companies;
			$connections_events = Event::dashboardEvents($connections)->get();
			$users_events = Event::usersEvents($user)->get();
		  	$data = compact('event', 'users_events', 'connections_events');
		  	return view('events.edit_event')->with($data);
		}

	}

	public function editgeneral()
	{
		$id = Auth::user()->id;
		$events = Event::usersEvents($id)->get();
		$data = compact('events');
		return view('admin.admin_show_events')->with($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
	  $event = Event::findOrFail($id);
	  return $this->validateAndSave($event, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	  $event = Event::findOrFail($id);
	  $event->delete();

	  if(!Auth::user()->is_admin) {
	  	return redirect()->action('companies.view_profile');
	  } else {
	  	return redirect()->action('admin.admin_dashboard');
	  }
	}

	private function validateAndSave(Event $event, Request $request){
		$company_id = Auth::user()->id;
		$is_admin = Auth::user()->is_admin;
		$request->session()->flash('ERROR_MESSAGE', 'Event not created successfully.');

		$this->validate($request, Event::$rules);
		$request->session()->forget('ERROR_MESSAGE');
		$event->company_id = $company_id;
		$event->title = $request->title;
		$event->desc = $request->desc;
		$event->from_date = $request->from_date;
		$event->to_date = $request->to_date;
		$event->invite_only = $request->invite_only;
		$event->rsvp_required = $request->rsvp_required;
		$event->url = $request->url;
		$this->storeImage($request, $event);
		$event->save();

		$request->session()->flash('message', 'Event successfully created.');
		if ($is_admin) {
		  return redirect()->action('UsersControllers@getAdminDashboard');
		} else {
		  return redirect()->action('EventsController@index');
		}
	}

	private function storeImage($request, $event)
	{
		$file = $request->file('img')->getClientOriginalName();
		$request->file('img')->move(public_path('img'), $request->file('img')->getClientOriginalName());
		$file_path = public_path('img/uploads/events') . '/' . $request->file('img')->getClientOriginalName();
		$event->img = $file;
	}
}
