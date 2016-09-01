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

		if($request->searchField){
			$query = $query->where('name', 'like', "%$request->searchField%")->orWhere('desc', 'like', "%$request->searchField%");
		}

		if($request->input('industry_id') != 0 && !$request->searchField){
			$query = $query->where('industry_id', $request->input('industry_id'));
		} elseif($request->input('industry_id') != 0) {
			$query = $query->orWhere('industry_id', $request->input('industry_id'));
		}

		if(!$request->searchField){
			if($request->woman_owned){
				$query = $query->where('woman_owned', 1);
				// dd($query->getQuery()->toSql());
			}

			if($request->contractor){
				$query = $query->where('contractor', 1);
			}

			if($request->family_owned){
				$query = $query->where('family_owned', 1);
			}

			if($request->organization){
				$query = $query->where('organization', 1);
			}
		}

		//var_dump(get_class_methods(get_class($query)));
		// echo $query->getQuery()->toSql();


		// $search = $request->searchField;
		// $industry = $request->input('industry_id');
		// $woman = $request->woman_owned;
		// $contractor = $request->contractor;
		// $family = $request->family_owned;
		// $org = $request->organization;


		// $query = Company::orderBy('created_at');

		// do {
		// 	switch ($request) {
		// 		case ($search !== ''):
		// 			$results = Company::searchCompanyName($search);
		// 			break;
		// 		case ($industry != 0):
		// 			$results = Company::where('industry_id', $industry);
		// 			break;
		// 		case ($woman):
		// 			$results = Company::where('woman_owned', 1);
		// 			break;
		// 		case ($contractor):
		// 	}
		// } while ();

		// $checkboxes = ["woman_owned", "contractor", "family_owned", "organization"];

		// foreach ($checkboxes as $checkbox) {
		// 	$query = Company::where('$checkbox', 1);
		// }

		// if{
		// 	$request ? $query->where('woman_owned', 1) : $query = Company::where('woman_owned', 1);
		// }

		// if($request->contractor){
		// 	$request ? $query->where('contractor', 1) : $query = Company::where('contractor', 1);
		// }

		// if($request->family_owned){
		// 	$request ? $query->where('family_owned', 1) : $query = Company::where('family_owned', 1);
		// }

		// if($request->organization){
		// 	$request ? $query->where('organization', 1) : $query = Company::where('organization', 1);
		// }
		// var_dump(get_class_methods(get_class($query)));
		// echo $query->getQuery()->toSql();
		// dd($query);
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
