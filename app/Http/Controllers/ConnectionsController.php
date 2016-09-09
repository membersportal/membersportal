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
    public function store(Request $request, $id)
    {
      $connection = new Connection();
      $connection->company1_id = Auth::user()->id;
      $connection->company2_id = $id;
      $connection->save();
      $request->session()->flash('SUCCESS_MESSAGE', 'New Connection!');
      return redirect()->action('CompaniesController@show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
      $connection = Connection::where('id', intval($id))->first();
      if ($connection->company1_id == Auth::user()->id) {
        $company_id = $connection->company2_id;
      } else {
        $company_id = $connection->company1_id;
      }
      $connection->delete();
      return redirect()->action('CompaniesController@show', $company_id);
    }
}