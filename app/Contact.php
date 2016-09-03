<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;
use App\User;

class Contact extends Model
{
	use SoftDeletes;

	public function company()
	{
		return $this->hasOne(Company::class, 'id');
	}

	public function user()
	{
		return $this->hasOne(User::class, 'id');
	}

	public function getAddressLine1Attribute($value)
	{
		return ucwords($value);
	}

	public function getAddressLine2Attribute($value)
	{
		return ucwords($value);
	}

	public function getAddressLine3Attribute($value)
	{
		return ucwords($value);
	}

	public function getCityAttribute($value)
	{
		return ucwords($value);
	}

	public static function searchLocations($results)
	{
		$contacts = [];
		foreach ($results as $company) {
			$contact = $company->contact;
			$contacts[] = $contact;
		}
		return $contacts;
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
}