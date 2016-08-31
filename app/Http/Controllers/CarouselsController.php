<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // first or last 3 carousel rows
        return $carousels;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.create_carousel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $carousel = new Carousel();
      return $this->validateAndSave($carousel, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $carousel = Carousel::findOrFail($id);
      $data = compact('carousel');
      return view('admin.edit_carousel')->with($data);
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
      $carousel = Carousel::findOrFail($id);
      return $this->validateAndSave($carousel, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $carousel = Carousel::findOrFail($id);
      $carousel->delete();
      return redirect()->action('admin.dashboard');
    }

    private function validateAndSave(Carousel $Carousel, Request $request){
        $request->session()->flash('ERROR_MESSAGE', 'Carousel was not created successfully'); //set error message if not saved
        $this->validate($request, Carousel::$rules); //validate that alll fields are filled out correctly
        $request->session()->forget('ERROR_MESSAGE'); // if validated, tell to forget the error message
        $carousel->title = $request->title; //can use $post->title = $request->input('title') alternatively
        $carousel->desc = $request->desc;
        $carousel->img = $request->img;
        $carousel->url = $request->url;
        $carousel->save(); //save when submited
        // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
        $request->session()->flash('message', 'Carousel item successfully saved!'); // flash success message when saved
        return redirect()->action('admin.dashboard'); //redirect to the index page
    }
}
