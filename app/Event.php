<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Company;
use App\Industry;

class Event extends Model
{
	use SoftDeletes;

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function industry()
	{
		return $this->belongsTo(Industry::class);
	}

	public function getTitleAttribute($value)
	{
		return ucwords($value);
	}

	public static function searchEvents($request)
	{
		if($request->search_field && $request->industry_id){
			return Event::where('company_id', $request->search_field)->orWhere('industry_id', $request->industry_id);
		} elseif ($request->search_field){
			return Event::where('company_id', $request->search_field);
		} else {
			return Event::where('industry_id', $request->industry_id);
		}
	}

	public static function usersEvents($id)
	{
		return Event::where('company_id', $id);
	}

	public static function grabWeekEvents()
	{
		$constraint = Carbon::now()->toDateTimeString();
		$week = Carbon::now()->addWeeks(1)->toDateTimeString();
		return Event::whereBetween('from_date', [$constraint, $week])->orderBy('from_date');
	}

	public static function grabMonthEvents()
	{
		$constraint = Carbon::now()->addWeeks(1)->toDateTimeString();
		$month = Carbon::now()->addWeeks(4)->toDateTimeString();
		return Event::whereBetween('from_date', [$constraint, $month])->orderBy('from_date');
	}

	public static function grabYearEvents()
	{
		$constraint = Carbon::now()->addWeeks(4)->toDateTimeString();
		$year = Carbon::now()->addWeeks(12)->toDateTimeString();
		return Event::whereBetween('from_date', [$constraint, $year])->orderBy('from_date');
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
