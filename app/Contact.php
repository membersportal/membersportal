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

	public function getPhoneNoAttribute($value)
	{
		return '(' . substr($value, 0, 3) . ') ' . substr($value, 3, 3) . '-' . substr($value, 6, 4);
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
     'address_line_1' => 'required|max:50',
     'address_line_2' => 'nullable|max:50',
     'address_line_3' => 'nullable|max:50',
     'city' => 'required|max:50',
     'state' => 'required|max:2',
     'zip' => 'required|integer',
     'country' => 'required|max:15',
     'website' => 'nullable|url',
     'twitter'  => 'nullable|max:20',
     'facebook' => 'nullable|max:20',
     'instagram' => 'nullable|max:20',
     'linkedin' => 'nullable|max:20',
     'google_plus' => 'nullable|max:20'
   	];
}