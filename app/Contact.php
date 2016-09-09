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

	public function getViewProfileWebsite($value)
	{
		if (substr($value, 0, 12) === 'https://www.') {
			return substr($value, 12);
		} elseif (substr($value, 0, 11) === 'http://www.') {
			return substr($value, 11);
		} else {
			return $value;
		}
	}

	public static function searchLocations($results)
	{
		$contacts = [];
		foreach ($results as $company) {
			$contact = $company->contact;
			$contact->industry = $company->industry;
			$contacts[] = $contact;
		}
		return $contacts;
	}

	public static $rules = [
     'phone_no' => 'required|integer',
     'address_line_1' => 'required|max:50',
     'address_line_2' => 'max:50',
     'address_line_3' => 'max:50',
     'city' => 'required|max:50',
     'state' => 'required|max:2',
     'zip' => 'required|integer',
     'country' => 'required|max:15',
     'website' => 'url',
     'twitter'  => 'max:20',
     'facebook' => 'max:200',
     'instagram' => 'max:200',
     'linkedin' => 'max:200',
     'google_plus' => 'max:200'
   	];
}
