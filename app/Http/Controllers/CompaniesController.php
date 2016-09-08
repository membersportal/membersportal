<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Connection;
use App\Contact;
use App\Event;
use App\Industry;
use App\Leader;
use App\Rfp;
use App\User;

class CompaniesController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.admin_create_company');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$company = new Company();
		return $this->validateAndSave($company, $request);
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
		$company = Company::findOrFail($id);
		$leaders = $company->leaders;
		$industries = Industry::all();
		$data = compact('company', 'industries', 'user');

		return view('companies.edit_company')->with($data);
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
		$company = Company::findOrFail($id);
		return $this->validateAndSave($company, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$company = Company::findOrFail($id);
		$company->delete();
		return redirect()->action('ContactsController@destroy', ['id' => $company->id]);
	}

	public function searchMembers(Request $request)
	{
		$industries = Industry::all();
		$current_user_address = Auth::user()->company->contact->address_line_1 . ' ' . Auth::user()->company->contact->city;
		$data = compact('industries', 'current_user_address');
		return view('search_members')->with($data);
	}

	public function getSearchedCompanies(Request $request)
	{
		$data = [];
		$data['results'] = Company::searchMembers($request)->with('contact')->get();
		foreach($data['results'] as &$result) {
			$result->url = action('CompaniesController@show', $result->id);
			$result->industry = $result->industry->industry;
		}
		$data['locations'] = Contact::searchLocations($data['results']);
		foreach ($data['locations'] as &$location) {
			$location->company;
		}
		return $data;
	}

	public function dashboard($id)
	{
		$company = Company::find($id);
		$connections = $company->companies;
		$feed_content = $this->buildFeed($connections);
		$users_rfps = $company->rfps;
		$users_events = $company->events;
		$data = compact('feed_content', 'users_rfps', 'users_events');
		return view('companies.companies_dashboard')->with($data);
	}

	public function viewConnections($id)
	{
		$user = User::find($id)->id;
		$connections = Company::findOrFail($user)->companies;
		$data = compact('connections');
		return view('companies.all_connections')->with($data);
	}

	public function show($id)
	{
		$company = Company::findOrFail($id);
		$contact = $company->contact;
		$rfps = Rfp::profileRfps($company->id)->get();
		$events = $company->events;
		$leaders = $company->leaders;
		$connections = Connection::viewConnections($id)->take(3)->get();
		$profile_connections = Company::profileConnections($connections)->get();
		$data = compact('company', 'contact', 'rfps', 'events', 'leaders', 'profile_connections');
		return view('companies.view_profile')->with($data);
	}

	private function validateAndSave(Company $company, Request $request)
	{
		$request->session()->flash('ERROR_MESSAGE', 'Company information not saved.');
		$this->validate($request, Company::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		$company->name = $request->name;
		$company->industry_id = $request->industry_id;
		$company->profile_img = $request->profile_img;
		$company->profile_img = $request->header_img;
		$company->desc = $request->desc;
		$company->size = $request->size;
		$company->woman_owned = $request->woman_owned;
		$company->contractor = $request->contactor;
		$company->family_owned = $request->family_owned;
		$company->organization = $request->organization;
		$company->date_established = $request->date_established;
		$company->save();

		if($is_admin){
			$request->session()->flash('SUCCESS_MESSAGE', 'Company saved successfully, please enter contact information.');
			return redirect()->action('ContactsController@create');
		} else {
			$request->session()->flash('SUCCESS_MESSAGE', 'Company information saved successfully.');
			return redirect()->action('UsersController@edit', ['id' => Auth::user()->id]);
		}
	}

	private function buildFeed($connections)
	{
		$collection = [];
		$dashboard_events = Event::dashboardEvents($connections)->get();
		$dashboard_rfps = RFP::dashboardRfps($connections)->get();
		$dashboard_connections = Connection::dashboardConnections($connections)->get();

		foreach($dashboard_events as $dashboard_event){
			$collection[] = $dashboard_event;
		}

		foreach($dashboard_rfps as $dashboard_rfp){
			$collection[] = $dashboard_rfp;
		}

		foreach ($dashboard_connections as $dashboard_connection) {
			$collection[] = $dashboard_connection;
		}
		$feed = collect($collection);
		$test = $feed->sortBy('created_at');
		return $test;
	}
}