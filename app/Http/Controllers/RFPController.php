<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Rfp;
use App\Company;

class RFPController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$rfps = Rfp::all();
		$user = Auth::user()->id;
		$connections = Company::find($user)->companies;
		$connections_rfps = Rfp::dashboardRfps($connections)->get();
		$users_rfps = Rfp::profileRfps($user)->get();
		$data = compact('connections_rfps', 'users_rfps', 'rfps');
		return view('rfps.all_rfps')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$user = Auth::user();
		$connections = Company::find($user->id)->companies;
		$connections_rfps = Rfp::dashboardRfps($connections)->get();
		$users_rfps = Rfp::profileRfps($user->id)->get();
		$data = compact('user', 'connections_rfps', 'users_rfps');
		return view('rfps.create_rfp')->with($data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rfp = new Rfp();
		return $this->validateAndSave($rfp, $request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
	  $rfp = Rfp::findOrFail($id);
		$rfp_owner = $rfp->company;
		$user = Auth::user()->id;
		$connections = Company::find($user)->companies;
		$connections_rfps = Rfp::dashboardRfps($connections)->get();
		$users_rfps = Rfp::profileRfps($user)->get();
		$data = compact('rfp', 'rfp_owner', 'connections_rfps', 'users_rfps');
	  return view('rfps.show_rfp')->with($data);
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
		$rfp = Rfp::findorfail($id);
		$connections = Company::find($user->id)->companies;
		$connections_rfps = Rfp::dashboardRfps($connections)->get();
		$users_rfps = Rfp::profileRfps($user->id)->get();
		$data = compact('rfp', 'connections_rfps', 'users_rfps');
		return view('rfps.edit_rfp')->with($data);
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
		$rfp = Rfp::findOrFail($id);
		return $this->validateAndSave($rfp, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$rfp = Rfp::findOrFail($id);
		$rfp->delete();
		$request->session()->flash('successMessage', 'RFP deleted successfully.');
		return redirect()->action('RFPController@index');
	}

	private function validateAndSave(Rfp $rfp, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'RFP not saved.');
		$this->validate($request, Rfp::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		$rfp->company_id = Auth::user()->id;
		$rfp->project_title = $request->project_title;
		$rfp->deadline = $request->deadline;
		$rfp->contact_name = $request->contact_name;
		$rfp->contact_department = $request->contact_department;
		$rfp->contact_no = $request->contact_no;
		$rfp->project_scope = $request->project_scope;
		$rfp->contract_from_date = $request->contract_from_date;
		$rfp->contract_to_date = $request->contract_to_date;
		$rfp->url = $request->url;
		$rfp->save();

		$request->session()->flash('message', 'RFP saved successfully.');
		return redirect()->action('RFPController@index');
	}
}