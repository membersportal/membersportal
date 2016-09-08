<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Company;
use App\Industry;


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
		$industries = Industry::all();
		$data = compact('events', 'users_events', 'connections_events', 'industries');
		return view('events.all_events')->with($data);
	}

	public function show($id)
	{
		$event = Event::findOrFail($id);
		$event_owner = $event->company;
		$user = Auth::user()->id;
		$connections = Company::find($user)->companies;
		$connections_events = Event::dashboardEvents($connections)->get();
		$users_events = Event::usersEvents($user)->get();
		$data = compact('event', 'event_owner', 'connections_events', 'users_events');
		return view('events.show_event')->with($data);
	}

	public function searchEvents(Request $request)
	{
		if(!$request){
			return redirect()->action('EventsController@index');
		}
		$searched_info = Event::searchEvents($request);
		$search_results = Event::usersEvents($searched_info->id)->get();

		$user = Auth::user()->id;
		$connections = Company::find($user)->companies;
		$connections_events = Event::dashboardEvents($connections)->get();
		$users_events = Event::usersEvents($user)->get();
		$industries = Industry::all();
		$data = compact('search_results', 'connections_events', 'users_events', 'industries');
		return view('events.search_results')->with($data);
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
		$users_events = Event::usersEvents($user->id)->get();
		$data = compact('users_events', 'connections_events');
		return view('events.create_event')->with($data);
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
	public function edit($id)
	{
		$user = Auth::user();
		$event = Event::findOrFail($id);
		$connections = Company::find($user->id)->companies;
		$connections_events = Event::dashboardEvents($connections)->get();
		$users_events = Event::usersEvents($user->id)->get();
		$data = compact('event', 'users_events', 'connections_events');
		return view('events.edit_event')->with($data);
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
		$request->session()->flash('SUCCESS_MESSAGE', 'Event deleted successfully.');
		return redirect()->action('EventsController@index');
	}

	private function validateAndSave(Event $event, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'Event not saved.');
		$this->validate($request, Event::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		$event->company_id = Auth::user()->id;
		$event->title = $request->title;
		$event->desc = $request->desc;
		$event->from_date = $request->from_date;
		$event->to_date = $request->to_date;
		$event->invite_only = $request->invite_only;
		$event->rsvp_required = $request->rsvp_required;
		$event->url = $request->url;
		$this->storeImage($request, $event);
		$event->save();

		$request->session()->flash('SUCCESS_MESSAGE', 'Event saved successfully.');
		return redirect()->action('EventsController@index');
	}

	private function storeImage($request, $event)
	{
		$file = $request->file('img')->getClientOriginalName();
		$request->file('img')->move(public_path('img'), $request->file('img')->getClientOriginalName());
		$file_path = public_path('img/uploads/events') . '/' . $request->file('img')->getClientOriginalName();
		$event->img = $file;
	}
}