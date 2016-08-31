<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
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
        return view('admin.create_account_contacts');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        return view('companies.edit_account_contact')->with($data);
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
        $message = 'Company, Contact, and User deleted';
        $request->session()->flash('sucessMessage', $message);
        return redirect()->action('admin.dashboard');


    }

    private function validateAndSave(Contact $contact, Request $request){
        $is_admin = Auth::user()->is_admin;
        $request->session()->flash('ERROR_MESSAGE', 'Contact was not created successfully'); //set error message if not saved
        $this->validate($request, Contact::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        $contact->phone_no = $request->phone_no; //can use $post->title = $request->input('title') alternatively
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
        $contact->google_plus = $request->google_plus;
        $contact->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        if ($is_admin) {
            $request->session()->flash('message', 'Contact was successful'); // flash success message when saved
            return redirect()->action('admin.dashboard'); //redirect to the index page    
        } else {
            $request->session()->flash('message', 'Contact was successful');
        }
        
    }
}
