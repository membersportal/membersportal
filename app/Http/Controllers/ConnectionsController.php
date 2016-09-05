<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Connection;
use App\Company;


class ConnectionsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
      $connection = new Connection();
      $connection->user1_id = Auth::user()->id; //can use $post->title = $request->input('title') alternatively
      $connection->user2_id = $id;
      $connection->save(); //save when submited
      // Log::info('User successfully creates post', $request->all()); // create custom log when post is created
      $request->session()->flash('message', 'New Connection!'); // flash success message when saved
      return redirect()->action('companies.view_profile'); //redirect to the index page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $connection = Connection::findOrFail($id);
      $connection->delete();
      return redirect()->action('companies.view_profile');
    }
}