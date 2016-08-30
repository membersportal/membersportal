<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Industry;


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
        return view('admin.create_account_company')
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
      $connection = $company->connections;
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
        $request->session()->flash('ERROR_MESSAGE', 'Company was not created successfully'); //set error message if not saved
        $this->validate($request, Company::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        $company->name = $request->name; //can use $post->title = $request->input('title') alternatively
        $company->industry_id = $request->industry_id;
        $company->profile_img = $request->profile_img;
        $company->desc = $request->desc;
        $company->female_owned = $request->female_owned;
        $company->freelance = $request->freelance;
        $company->organization = $request->organization;
        $company->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        if($is_admin){
          $request->session()->flash('message', 'Company was successfully created!'); // flash success message when saved
          return redirect()->action('ContactsController@create'); //redirect to the index page
        } else {
          $request->session()->flash('message', 'Company information was successfully updated!'); // flash success message when saved
          return redirect()->action('companies.view_profile');
        }
    }
}
