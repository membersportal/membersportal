<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;

class Event extends Model
{
	use SoftDeletes;

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function getTitleAttribute($value)
	{
		return ucwords($value);
	}

	public static function searchEvents($request)
	{
		$query = Event::orderBy('created_at');

		if($request->searchField != ''){
			(isset($query)) ? $query->where('company_id', "%$$request->searchField%")->orWhere('title', 'like', "%$request->searchField%") : $query = Event::searchCompanyName($request->searchField);
		}

		if($request->option('industry_id') != 0){
			(isset($query)) ? $query->orWhere('industry_id', $request->industry_id) : $query = Event::where('industry_id', $request->industry_id);
		}

		//var_dump(get_class_methods(get_class($query)));
		// echo $query->getQuery()->toSql();

		return $query->get();
	}

	public static function searchCompanyName($request)
	{
		return Event::where('name', 'like', "%$request->searchField%")->orWhere('title', 'like',"%$request->searchField%");
	}

	public static function dashboardEvents($connections)
	{
		$companies = [];

		foreach($connections as $connection){
			$company = $connection->company_id;
			$companies[] = $company;
		}
		return Event::whereIn('company_id', $companies)->orderBy('created_at');
	}

	protected $dates = [
		'from_date',
		'to_date'
	];

	public static $rules = [
		'title' => 'required|max:75',
		'desc' => 'required|filled',
		'from_date' => 'required|date',
		'to_date' => 'required|date',
		'invite_only' => 'required|boolean',
		'rsvp_required' => 'required|boolean',
		'url' => 'required|url',
		'img' => 'required|image'
	];
	//
}
