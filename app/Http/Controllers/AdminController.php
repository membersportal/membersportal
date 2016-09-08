<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\Event;
use App\Rfp;
use App\User;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = User::find(Auth::user()->id);
		$data = compact('user');
		return view('admin.admin_dashboard')->with($data);
	}

	// Users ===============================================
	public function manageUsers()
	{
		$users = User::countUsers();
		$last_user_added = User::returnLastUserAdded();
		$data = compact('users', 'last_user_added');
		return view('admin.admin_manage_users')->with($data);
	}

	public function deleteUser(Request $request)
	{
		$searched_user = User::searchUser($request);
		$searched_user_company = $searched_user->company;
		$data = compact('searched_user_company');
		return view('admin.admin_delete_user')->with($data);
	}

	// Org Login/Contact ===============================================
	public function editOrgLogin($id)
	{
		$user = User::findOrFail($id);
		$data = compact('user');
		return view('admin.admin_edit_org_login')->with($data);
	}

	public function editOrgContact($id)
	{
		$contact = Contact::findOrFail($id);
		$data = compact('contact');
		return view('admin.admin_edit_org_contact')->with($data);
	}

	public function updateOrgLogin(Request $request, $id)
	{
		$user = User::findOrFail($id);
		return $this->validateUserAndSave($user, $request);
	}

	public function updateOrgContact(Request $request, $id)
	{
		$contact = Contact::findOrFail($id);
		return $this->validateContactAndSave($contact, $request);
	}

	// Events ===============================================
	public function eventIndex()
	{
		$events = Event::paginate(10);
		$paginate = 10;
		$data = compact('events', 'paginate');
		return view('admin.admin_manage_events')->with($data);
	}

	public function createEvent()
	{
		return view('admin.admin_create_event');
	}

	public function storeEvent()
	{
		$event = new Event();
		return $this->validateEventAndSave($event, $request);
	}

	public function editEvent($id)
	{
		$event = Event::findOrFail($id);
		$data = compact('event');
		return view('admin.admin_edit_event')->with($data);
	}

	public function updateEvent($id)
	{
		$event = Event::findOrFail($id);
		return $this->validateEventAndSave($event, $request);
	}

	public function destroyEvent($id)
	{
		$event = Event::findOrFail($id);
		$event->delete();
		return redirect()->action('EventsController@adminIndex');
	}

	// RFPs ===============================================
	public function rfpIndex()
	{
		$rfps = Rfp::paginate(10);
		$paginate = 10;
		$data = compact('rfps', 'paginate');
		return view('admin.admin_manage_rfps')->with($data);
	}

	public function createRfp()
	{
		return view('admin.admin_create_rfp');
	}

	public function storeRfp()
	{
		$rfp = new Rfp();
		return $this->validateRfpAndSave($rfp, $request);
	}

	public function editRfp($id)
	{
		$rfp = Rfp::findOrFail($id);
		$data = compact('rfp');
		return view('admin.admin_edit_rfp')->with($data);
	}

	public function updateRfp($id)
	{
		$rfp = Rfp::findOrFail($id);
		return $this->validateRfpAndSave($rfp, $request);
	}

	public function destroyRfp($id)
	{
		$rfp = Rfp::findOrFail($id);
		$rfp->delete();
		return redirect()->action('RFPController@adminIndex');
	}


	private function validateUserAndSave(User $user, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'User was not created successfully');
		$this->validate($request, User::$rules);
		$request->session()->forget('ERROR_MESSAGE');
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->username = $request->username;
		$user->password = $request->password;
		$user->save();

		$request->session()->flash('message', 'User login information successfully updated.');
		return redirect()->action('AdminController@index');
	}

	private function validateContactAndSave(Contact $contact, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'Contact not created successfully.');
		$this->validate($request, Contact::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		$contact->phone_no = $request->phone_no;
		$contact->address_line_1 = $request->address_line_1;
		$contact->address_line_2 = $request->address_line_2;
		$contact->address_line_3 = $request->address_line_3;
		$contact->city = $request->city;
		$contact->state = $request->state;
		$contact->zip = $request->zip;
		$contact->country = $request->country;
		$contact->website = $request->website;
		$contact->twitter = $request->twitter;
		$contact->facebook = $request->facebook;
		$contact->instagram = $request->instagram;
		$contact->linkedin = $request->linkedin;
		$contact->google_plus = $request->google_plus;
		$contact->save();

		$request->session()->flash('message', 'Contact information successfully updated.');
		return redirect()->action('AdminController@index');
	}

	private function validateEventAndSave(Event $event, Request $request)
	{
		$request->session()->flash('ERROR_MESSAGE', 'Event not created successfully.');
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

		$request->session()->flash('message', 'Event successfully created.');
		return redirect()->action('EventsController@adminIndex');
	}

	private function storeImage($request, $event)
	{
		$file = $request->file('img')->getClientOriginalName();
		$request->file('img')->move(public_path('img'), $request->file('img')->getClientOriginalName());
		$file_path = public_path('img/uploads/events') . '/' . $request->file('img')->getClientOriginalName();
		$event->img = $file;
	}
}