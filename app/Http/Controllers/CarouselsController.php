<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Supp;

class CarouselsController extends Controller
{
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
		$request->session()->flash('ERROR_MESSAGE', 'Carousel was not created successfully'); 
		$this->validate($request, Carousel::$rules);
		$request->session()->forget('ERROR_MESSAGE');
		$carousel->title = $request->title;
		$carousel->desc = $request->desc;
		$carousel->img = $request->img;
		$carousel->url = $request->url;
		$carousel->save();
		$request->session()->flash('message', 'Carousel item successfully saved!');
		return redirect()->action('admin.dashboard');
	}
}
