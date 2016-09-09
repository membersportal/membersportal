<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Contact;
use App\User;

class ContactsController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.admin_create_contact');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$contact = new Contact();
		return $this->validateAndSave($contact, $request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$contact = Contact::findOrFail($id);
		$data = compact('contact');
		return view('contacts.edit_contact')->with($data);
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
		$contact = Contact::findOrFail($id);
		return $this->validateAndSave($contact, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$contact = Contact::findOrFail($id);
		$contact->delete();
		$request->session()->flash('SUCCESS_MESSAGE', 'User deleted successfully.');
		return redirect()->action('AdminController@index');
	}

	private function validateAndSave(Contact $contact, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'Contact information not saved.');
		$this->validate($request, Contact::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		if(Auth::user()->is_admin){
			$contact->user_id = User::all()->last()->id;
			$contact->company_id = Company::all()->last()->id;
		}
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

		$is_admin = Auth::user()->is_admin;

		if ($is_admin) {
			$request->session()->flash('SUCCESS_MESSAGE', 'Contact saved successfully. New user saved.');
			return redirect()->action('AdminController@index');
		} else {
			$request->session()->flash('SUCCESS_MESSAGE', 'Contact information saved successfully.');
			return redirect()->action('UsersController@edit', ['id' => Auth::user()->id]);
		}
	}
}
