<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Article;
use App\Carousel;
use App\Company;
use App\Contact;
use App\Leader;
use App\Rfp;
use App\User;


class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (!Auth::check()) {
			return view('auth.login');
		}

		$newest_member = Company::newestMember();
		$admin_user = User::find(1);
		$admin_events = $admin_user->company->events;
		$admin_rfps = Rfp::homeRfps();
		$contact = $admin_user->contact;
		$carousels = Carousel::pullCarousels();
		$articles = Article::homeArticles();
		$data = compact('newest_member', 'carousels', 'admin_user', 'admin_events', 'admin_rfps', 'articles', 'contact');
		return view('home')->with($data);
	}

	public function create()
	{
		return view('admin.admin_create_user');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = new User();
		return $this->validateAndSave($user, $request);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$data = compact('user');

		return view('users.edit_login')->with($data);
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
		$user = User::findOrFail($id);
		return $this->validateAndSave($user, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		return redirect()->action('CompaniesController@destroy', $user->id);
	}

	private function validateAndSave(User $user, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'User was not saved successfully');
		$this->validate($request, User::$rules);
		$request->session()->forget('ERROR_MESSAGE');
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->username = $request->username;
		$user->password = $request->password;
		$user->save();

		if (Auth::user()->is_admin) {
			$request->session()->flash('SUCCESS_MESSAGE', 'User successfully created, please enter company information.');

			return redirect()->action('CompaniesController@create');
		} else {
			$request->session()->flash('SUCCESS_MESSAGE', 'User login information successfully updated.');
			return redirect()->action('UsersController@edit', Auth::user()->id);
		}
	}
}
