<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Company;
use App\Carousel;
use App\Rfp;


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
        $carousels = Carousel::pullCarousels();
        $admin_rfps = Rfp::homeRfps()->take(5)->get();
        $data = compact('newest_member', 'carousels', 'admin_user', 'admin_events', 'admin_rfps');
        return view('home')->with($data);
    }

    public function editUsers(Request $request)
    {
        $searchedUser = User::searchUser($request);
        $searchedUserCompany = $searchedUser->company;
        $data = compact('searchedUserCompany');
        return view('admin.edit_users')->with($data);
    }

    public function create()
    {
        return view('admin.create_account_login');
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
        return view('users.edit_account_login')->with('user', $user);
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
        return redirect()->action('CompaniesController@destroy');
    }

    public function adminSearchUser(Request $request)
    {
        $user = User::searchUser($request);
        return view('admin.edit_users')->with('user', $user);
    }

    public function getAdminDashboard()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.dashboard')->with('user', $user);
    }

    private function validateAndSave(User $user, Request $request){
        $request->session()->flash('ERROR_MESSAGE', 'User was not created successfully');
        $this->validate($request, User::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        $is_admin = Auth::user()->is_admin;

        if ($is_admin) {
            $request->session()->flash('message', 'User successfully created, please enter company information.');
            return redirect()->action('CompaniesController@create');
        } else {
            $request->session()->flash('message', 'User login information successfully updated.');
            return redirect()->action('UsersController@edit', ['id' => Auth::user()->id]);
        }
    }
}