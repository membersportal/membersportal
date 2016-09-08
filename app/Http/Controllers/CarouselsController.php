<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Supp;
use App\Carousel;

class CarouselsController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.admin_create_carousel');
	}

	public function adminIndex()
	{
		$carousels = Carousel::paginate(5);
		$paginate = 5;
		$data = compact('carousels', 'paginate');
		return view('admin.admin_manage_carousels')->with($data);
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
		return view('admin.admin_edit_carousel')->with($data);
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
		dd($request);
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
		return redirect()->action('admin.admin_dashboard');
	}

	private function validateAndSave(Carousel $Carousel, Request $request){
		$request->session()->flash('ERROR_MESSAGE', 'Carousel not created successfully.');
		$this->validate($request, Carousel::$rules);
		$request->session()->forget('ERROR_MESSAGE');

		$carousel->title = $request->title;
		$carousel->desc = $request->desc;
		$carousel->url = $request->url;
		$this->storeImage($request, $carousel);
		$carousel->save();

		$request->session()->flash('message', 'Carousel item successfully saved.');
		return redirect()->action('admin.admin_dashboard');
	}

	private function storeImage($request, $event)
	{
		$file = $request->file('img')->getClientOriginalName();
		$request->file('img')->move(public_path('img'), $request->file('img')->getClientOriginalName());
		$file_path = public_path('img/carousel') . '/' . $request->file('img')->getClientOriginalName();
		$carousel->img = $file;
	}
}
