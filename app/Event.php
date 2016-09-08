<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Carbon;
use App\Company;
use App\Event;

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
		if($request->search_field && $request->industry_id){
			return Company::where('name', 'like', "%$request->search_field%")->orWhere('industry_id', "$request->industry_id");
		} elseif($request->search_field) {
			return Company::where('name', 'like', "%$request->search_field%")->get();
		} elseif ($request->industry_id) {
			return Company::where('industry_id', "$request->industry_id")->get();
		} else {
			return $query;
		}
	}

	public static function usersEvents($id)
	{
		return Event::where('company_id', $id);
	}

	public static function grabWeekEvents()
	{
		$week = Carbon::now()->addWeeks(1);
		$now = Carbon::now();
		$events = Event::where('from_date', '<', $week)->where('from_date', '>', $now)->orderBy('from_date');
		dd($events);
		return $events;
	}

	public static function dashboardEvents($connections)
	{
		$companies = [];
		foreach($connections as $connection){
			$company = $connection->id;
			$companies[] = $company;
		}
		return Event::whereIn('company_id', $companies)->orderBy('created_at');
	}

	public static function adminEvents()
	{
		return Event::whereIn('company_id', [1,2,3,4]);
	}

	protected $dates = [
		'from_date',
		'to_date'
	];

	public static $rules = [
		'title' => 'required|max:75',
		'desc' => 'required',
		'from_date' => 'required|date_format:"Y-m-d"',
		'to_date' => 'required|date_format:"Y-m-d"',
		'invite_only' => 'boolean',
		'rsvp_required' => 'boolean',
		'url' => 'required|url',
		'img' => 'image|required'
	];
}