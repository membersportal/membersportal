<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Connection;
use App\Contact;
use App\Industry;
use App\Leader;
use App\Rfp;
use App\User;

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

	public function rfps()
	{
		return $this->hasMany(Rfp::class, 'company_id');
	}

	public function companies()
	{
		return $this->belongsToMany(Company::class, 'connections', 'company1_id', 'company2_id');
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
			$companies[] = $company;
		}

		return Company::whereIn('company_id', $companies);
	}

	public static function returnCompaniesFromIds($connections_ids)
	{
		$companies = [];

		foreach ($connections_ids as $id) {
			$company = Company::where('id', $id)->get();
			$companies[] = $company;
		}

		return $companies;
	}

	public static function searchCompanyName($request)
	{
		return Company::where('name', 'like', "%$request->search_field%");
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

		return $query;
	}

	public function getNameAttribute($value)
	{
		return ucwords($value);
	}

	public function getDescAttribute($value)
	{
		return ucfirst($value);
	}

	public static $rules = [
		'name' => 'required|max:120',
		'industry_id' => 'required|integer',
		'profile_img' => 'image',
		'header_img' => 'image',
		'desc' => 'required|max:2000',
		'size' => 'max:20',
		'woman_owned' => 'boolean',
		'family_owned' => 'boolean',
		'business_type' => 'required',
		'date_established' => 'date_format:"Y-m-d"'
 	];
}
