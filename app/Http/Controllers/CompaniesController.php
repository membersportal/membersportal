<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Industry;
use App\Contact;
use App\Company;
use App\Connect;


class CompaniesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.create_account_company');
	}

	public function searchMembers(Request $request)
	{
		$industries = Industry::all();
		$results = Company::searchMembers($request)->paginate(6);
		$locations = Contact::searchLocations($results);
		$data = compact('results', 'locations', 'industries');
		return view('search')->with($data);
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function dashboard($id)
	{
		$user = User::find($id);
		$data = compact('user');
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
		$contact = $company->contacts;
		$rfp = $company->rfps;
		$event = $company->events;
		$leader = $company->leaders;
		$connection = Connection::viewConnections($id)->take(3)->get();
		$data = compact('company', 'contact', 'rfp', 'event', 'leader', 'connection');
		return view('companies.view_profile')->with($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$company = Company::findOrFail($id);
		$industry = Industry::all();
		$data = compact('company');
		return view('companies.edit_account_company')->with($data);
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

	private function validateAndSave(Company $company, Request $request){
		$is_admin = Auth::user()->is_admin;
		$request->session()->flash('ERROR_MESSAGE', 'Company was not created successfully');
		$this->validate($request, Company::$rules);
		$request->session()->forget('ERROR_MESSAGE');
		$company->name = $request->name;
		$company->industry_id = $request->industry_id;
		$company->profile_img = $request->profile_img;
		$company->desc = $request->desc;
		$company->woman_owned = $request->woman_owned;
		$company->contractor = $request->contactor;
		$company->family_owned = $request->family_owned;
		$company->organization = $request->organization;
		$company->save();
		if($is_admin){
		  $request->session()->flash('message', 'Company was successfully created!');
		  return redirect()->action('ContactsController@create');
		} else {
		  $request->session()->flash('message', 'Company information was successfully updated!');
		  return redirect()->action('companies.view_profile');
		}
	}
}
