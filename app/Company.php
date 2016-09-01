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

	public function user()
	{
		return $this->hasOne(User::class, 'id');
	}

	public function contact()
	{
		return $this->hasOne(Contact::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class, 'company_id');
	}

	public function industry()
	{
		return $this->belongsTo(Industry::class, 'industry_id');
	}

	public function leaders()
	{
		return $this->hasMany(Leader::class, 'id');
	}

	public function connections()
	{
			return $this->hasManyThrough(Company::class, Connection::class, 'company1_id', 'company2_id');
	}

	public static function newestMember()
	{
		return Company::orderBy('created_at', 'desc')->first();
	}

	public static function searchLocations($connections)
	{
		$companies = $connections->user2_id;
		return Company::whereIn('company_id', $companies)->get();
	}

	public static function searchMembers($request)
	{
		$query = Company::orderBy('created_at');

		if($request->searchField != ''){
			(isset($query)) ? $query->where('name', 'like', "%$$request->searchField%")->orWhere('desc', 'like', "%$request->searchField%") : $query = Company::searchCompanyName($request->searchField);
		}

		if($request->option !== 0){
			(isset($query)) ? $query->orWhere('industry_id', $request->industry_id) : $query = Company::where('industry_id', $request->industry_id);
		}

		if($request->woman_owned){
			(isset($query)) ? $query->where('woman_owned', 1) : $query = Company::where('woman_owned', 1);
		}

		if($request->contractor){
			(isset($query)) ? $query->where('contractor', 1) : $query = Company::where('contractor', 1);
		}

		if($request->family_owned){
			(isset($query)) ? $query->where('family_owned', 1) : $query = Company::where('family_owned', 1);
		}

		if($request->organization){
			(isset($query)) ? $query->where('organization', 1) : $query = Company::where('organization', 1);
		}
		//var_dump(get_class_methods(get_class($query)));
		// echo $query->getQuery()->toSql();

		return $query;
	}

	public static function searchCompanyName($request)
	{
		return Company::where('name', 'like', "%$request->searchField%")->orWhere('desc', 'like',"%$request->searchField%");
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
