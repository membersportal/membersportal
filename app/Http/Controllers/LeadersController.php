<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeadersController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('leaders.create_leader');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$leader = new Leader();
		return $this->validateAndSave($leader, $request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$leader = Leader::findOrFail($id);
		$data = compact('leader');
		return view('leaders.edit_leader')->with($data);
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
		$leader = Leader::findOrFail($id);
		return $this->validateAndSave($leader, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$leader = Leader::findOrFail($id);
		$leader->delete();
		$request->session()->flash('message', 'Entry deleted.');
		return redirect()->action('companies.view_profile');
	}
	
	private function validateAndSave(Leader $rfp, Request $request){
		$company_id = new Auth::user()->id;    
		$request->session()->flash('ERROR_MESSAGE', 'Leader was not created successfully'); 
		$this->validate($request, Leader::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		$leader->company_id = $company_id;
		$leader->full_name = $request->full_name;
		$leader->title = $request->title;
		$leader->image = $request->image;
		$leader->linkedin_url = $request->linkedin_url;
		$leader->save();

		$request->session()->flash('message', 'Entry saved.');
		return redirect()->action('companies.view_profile');
}
