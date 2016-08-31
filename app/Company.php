<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Industry;
use App\Leader;

class Company extends Model
{
	use SoftDeletes;

	public function users()
	{
		return $this->hasOne(User::class, 'id');
	}

	public function events()
	{
		return $this->hasMany(Event::class, 'company_id');
	}

	public function industries()
	{
		return $this->belongsTo(Industry::class, 'id');
	}

	public function leaders()
	{
		return $this->hasMany(Leader::class, 'id');
	}

	public static function newestMember()
	{
		return Company::orderBy('created_at', 'desc')->first();
	}

	public static function searchMembers($request)
	{
		$query = Company::;
		$first = TRUE;

		if($request->input('searchField')){
			$query .= searchCompanyName($request);
		}

		if($request->)

		return $query;
	}



	public static function searchCompanyName($request)
	{
		return where('name', "$request->input('searchField')")->orWhere('desc', 'like',"%$request->input('searchField')%");
	}

	public static function searchIndustry($request)
	{
		return where()$select('option_value')
	};

	public static function searchCharcteristics($request)
	{

	};

	public static $rules = [
     'name' => 'required|max:120',
     'industry_id' => 'required|integer',
     'profile_img' => 'nullable|image',
     'header_img' => 'nullable|image',
     'desc' => 'nullable|filled',
     'woman_owned' => 'required|boolean',
		 'family_owned' => 'required|boolean',
     'contractor' => 'required|boolean',
     'organization' => 'required|boolean'
   	];
    //
}
