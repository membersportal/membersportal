<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Industry;
use App\Contact;
use App\Company;
use App\Rfp;
use App\Event;
use App\User;
use App\Connection;

class CompaniesController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.create_account_company');
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
		$industry = Industry::all();
		$data = compact('company', 'industry', 'user');

		if($user->id != 1) {
		return view('companies.edit_account_company')->with($data);
		} else {
			return view('admin.edit_account_company');
		}
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
		return redirect()->action('ContactsController@destroy');
	}

	public function searchMembers(Request $request)
	{
		$industries = Industry::all();
		$current_user_address = Auth::user()->company->contact->address_line_1 . ' ' . Auth::user()->company->contact->city;
		$data = compact('industries', 'current_user_address', 'results');
		return view('search')->with($data);
	}

	public function getSearchedCompanies(Request $request)
	{
		$data = [];
		$data['results'] = Company::searchMembers($request)->get();
		foreach($data['results'] as &$result) {
			$result->url = action('CompaniesController@show', $result->id);
			$result->industry = $result->industry->industry;
		}
		$data['locations'] = Contact::searchLocations($data['results']);
		return $data;
	}

	public function dashboard($id)
	{
		$company = Company::find($id);
		$connections = $company->connections;
		dd($connections);
		$feedContent = $this->buildFeed($connections);
		$usersRfps = $company->rfps;
		$usersEvents = $company->events;
		$data = compact('feedContent', 'usersRfps', 'usersEvents');
		return view('companies.dashboard')->with($data);
	 }

	public function viewConnections($id)
	{
		$user = User::find($id);
		$data = compact('user');
		return view('companies.connections')->with($data);
	}

	public function show($id)
	{
		$company = Company::findOrFail($id);
		$contact = $company->contact;
		$rfps = $company->rfps;
		$events = $company->events;
		$leader = $company->leaders;
		$connections = Connection::viewConnections($id)->take(3)->get();
		$profileConnections = Company::profileConnections($connections)->get();
		$data = compact('company', 'contact', 'rfps', 'events', 'leader', 'profileConnections');
		return view('companies.view_profile')->with($data);
	}

	private function validateAndSave(Company $company, Request $request)
	{
		$request->session()->flash('ERROR_MESSAGE', 'Company was not created successfully');
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

		$is_admin = Auth::user()->is_admin;

		if($is_admin){
			$request->session()->flash('message', 'Company successfully created, please enter contact information.');
			return redirect()->action('ContactsController@create');
		} else {
			$request->session()->flash('message', 'Company information successfully updated.');
			return redirect()->action('UsersController@edit', ['id' => Auth::user()->id]);
		}
	}

	private function buildFeed($connections)
	{
		$collection = [];
		$dashboardEvents = Event::dashboardEvents($connections);
		$dashboardRfps = RFP::dashboardRfps($connections);
		$dashboardConnections = Connection::dashboardConnections($connections);

		foreach($dashboardEvents as $dashboardEvent){
			$collection[] = $dashboardEvent;
		}

		foreach($dashboardRfps as $dashboardRfp){
			$collection[] = $dashboardRfp;
		}

		foreach ($dashboardConnections as $dashboardConnection) {
			$collection[] = $dashboardConnection;
		}

		return $collection->sortBy('created_at');
	}
}
