<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;
use App\User;

class Contact extends Model
{
	use SoftDeletes;

	public function companies()
	{
		return $this->hasOne(Company::class, 'id');
	}

	public function users()
	{
		return $this->hasOne(User::class, 'id');
	}

	public static $rules = [
     'phone_no' => 'required|integer',
     'address_line_1' => 'required|max:100',
     'address_line_2' => 'nullable|max:100',
     'address_line_3' => 'nullable|max:100',
     'city' => 'required|max:100',
     'state' => 'required|max:2',
     'zip' => 'required|integer',
     'country' => 'required|max:15',
     'website' => 'nullable|url',
     'twitter'  => 'nullable|max:32',
     'facebook' => 'nullable|max:32',
     'instagram' => 'nullable|max:32',
     'google_plus' => 'nullable|max:32'
   	];
    //
}
