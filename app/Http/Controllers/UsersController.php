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
        $carousels = Carousel::pullCarousels();
        $data = compact('newest_member', 'carousels', 'admin_user');
        return view('home')->with($data);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     $data = compact('user');
    //     return view('users.edit_account_login')->with($data);
    // }

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
        return view('users.edit_account_login')->with($data);
    }

    public function searchUser(Request $request)
    {
      $result = User::searchUser($request);
      $data = compact('results');
      return view('')->with($data);
    }

    public function editAccountContact($user_id)
    {
        $contact = Contact::find($id);
        $data = compact('contact');
        return view('users.edit_account_contact')->with($data);
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
        //
    }

    public function getAdminDashboard()
    {
        $user = User::find(Auth::user()->id);
        $data = compact('user');
        return view('admin.dashboard')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateAndSave(User $user, Request $request){
        $is_admin = Auth::user()->is_admin;
        $request->session()->flash('ERROR_MESSAGE', 'User was not created successfully'); //set error message if not saved
        $this->validate($request, User::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        $user->first_name = $request->first_name; //can use $post->title = $request->input('title') alternatively
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        if($is_admin){
          $request->session()->flash('message', 'User was successfully created!'); // flash success message when saved
          return redirect()->action(''); //redirect to the index page
        } else {
          $request->session()->flash('message', 'User information successfully updated!'); // flash success message when saved
          return redirect()->action('');
        }
    }
}
