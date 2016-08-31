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

	public static function searchMembers($searchField = null, $name = '')
	{
		$query = Company::orderBy('created_at');
		$first = TRUE;

		if($searchField){
			$query = Company::searchCompanyName($searchField);
		}

		if($name != ''){
			$query->orWhere('industry_id', $name);
		}
		//var_dump(get_class_methods(get_class($query)));
		echo $query->getQuery()->toSql();

		return $query->get();
	}



	public static function searchCompanyName($searchField)
	{
		return Company::orWhere('name', $searchField)->orWhere('desc', 'like',"%$searchField%");
	}

	public static function searchIndustry($request)
	{
		//return Company::where()$select('option_value')
	}

	public static function searchCharacteristics($request)
	{

	}

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
