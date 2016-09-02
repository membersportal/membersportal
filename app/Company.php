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
		$companies = [];
		foreach($connections as $connection) {
			$company = $connection->company2_id;
			$companyies[] = $company;
		}

		return Company::whereIn('company_id', $companies);
	}

	public static function searchMembers($request)
	{
		$query = Company::orderBy('created_at');
		$search = $request->searchField;
		$industry = $request->input('industry_id');
		$woman = $request->woman_owned;
		$contractor = $request->contractor;
		$family = $request->family_owned;
		$org = $request->organization;

		if($search) {
			$query = $query->where('name', 'like', "%$search%")->orWhere('desc', 'like', "%$search%");
		}

		if($industry != 0 && $search){
			$query = $query->orWhere('industry_id', $industry);
			// dd($query->getQuery()->toSql());
		} elseif($industry != 0){
			$query = $query->where('industry_id', $industry);
		}

		if($search || $industry !=0) {
			if($woman){
				$query = $query->orWhere('woman_owned', 1);
			}

			if($contractor){
				$query = $query->orWhere('contractor', 1);
			}

			if($family){
				$query = $query->orWhere('family_owned', 1);
			}

			if($org){
				$query = $query->orWhere('organization', 1);
			}
		} else {
			if($woman){
				$query = $query->where('woman_owned', 1);
			}

			if($contractor){
				$query = $query->where('contractor', 1);
			}

			if($family){
				$query = $query->where('family_owned', 1);
			}

			if($org){
				$query = $query->where('organization', 1);
			}
		}

		// dd($query->getQuery()->toSql());

		//var_dump(get_class_methods(get_class($query)));

		return $query;
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
