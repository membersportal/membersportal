<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('events.all')->with('events', $events);
    }

    public function searchEvents(Request $request)
    {
      $results = Event::searchEvents($request);

      $data = compact('results');
        return view('search')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $event = new Event();
      return $this->validateAndSave($event, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $event = Event::findOrFail($id);
      $company = $event->companies;
      $data = compact('event', 'company');
      return view('')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::findOrFail($id);
      $data = compact('event');
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
      $event = Event::findOrFail($id);
      return $this->validateAndSave($event, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::findOrFail($id);
      $event->delete();
      return redirect()->action('companies.view_profile');
    }

    private function validateAndSave(Event $event, Request $request){
        $company_id = Auth::user()->id;
        $is_admin = Auth::user()->is_admin;
        $request->session()->flash('ERROR_MESSAGE', 'User was not created successfully'); //set error message if not saved
        $this->validate($request, Event::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        $event->company_id = $company_id;
        $event->desc = $request->desc;
        $event->from_date = $request->from_date;
        $event->to_date = $request->to_date;
        $event->invite_only = $request->invite_only;
        $event->rsvp_required = $request->rsvp_required;
        $event->url = $request->url;
        $event->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        if($is_admin){
          $request->session()->flash('message', 'Event was successful!'); // flash success message when saved
          return redirect()->action('admin.dashboard'); //redirect to the index page
        } else {
          $request->session()->flash('message', 'Event was successfully created!'); // flash success message when saved
          return redirect()->action('companies.view_profile');
        }
}
