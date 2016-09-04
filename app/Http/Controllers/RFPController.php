<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RFPController extends Controller
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
        $user = Auth::user();
        $data = compact('user');
        return view('rfps.create')->with($data);
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
      $company_id = $rfp->companies;
      $data = compact('rfp', 'company_id');
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
        $user = Auth::user();
        $rfp = Rfp::findOrFail($id);
        $data = compact('contact', 'user');
        return view('rfps.edit')->with($data);
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
    public function destroy($id)
    {
        $rfp = Rfp::findOrFail($id);
        $rfp->delete();
        $message = 'RFP deleted';
        $request->session()->flash('sucessMessage', $message);
        return redirect()->action('companies.view_profile');
    }

    private function validateAndSave(Rfp $rfp, Request $request){
        $company_id = Auth::user()->id;
        $is_admin = Auth::user()->is_admin;
        $request->session()->flash('ERROR_MESSAGE', 'RFP was not created successfully'); //set error message if not saved
        $this->validate($request, Rfp::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        $rfp->company_id = $company_id //can use $post->title = $request->input('title') alternatively
        $rfp->project_title = $request->project_title;
        $rfp->deadline = $request->deadline;
        $rfp->contact_name = $request->contact_name;
        $rfp->contact_department = $request->contact_department;
        $rfp->contact_no = $request->contact_no;
        $rfp->project_scope = $request->project_scope;
        $rfp->contract_to_date = $request->contract_to_date;
        $rfp->contract_from_date = $request->contract_from_date;
        $rfp->save();

        if ($is_admin) {
            $request->session()->flash('message', 'RFP was successful'); // flash success message when saved
            return redirect()->action('admin.dashboard'); //redirect to the index page
        } else {
            $request->session()->flash('message', 'RFP was successful');
        }
}
