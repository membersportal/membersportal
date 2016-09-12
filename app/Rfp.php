<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Company;

class Rfp extends Model
{
	use SoftDeletes;

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function industry()
	{
		return $this->belongsTo(Company::class);
	}

	public function getProjectTitleAttribute($value)
	{
		return ucwords($value);
	}

	public function getContactNameAttribute($value)
	{
		return ucwords($value);
	}

	public function getContactDepartmentAttribute($value)
	{
		return ucwords($value);
	}

	public static function dashboardRfps($connections)
	{
		$companies = [];

		foreach($connections as $connection){
			$company = $connection->id;
			$companies[] = $company;
		}
		return Rfp::whereIn('company_id', $companies)->orderBy('created_at');
	}

	public static function searchRfps($request)
	{
		if($request->search_field && $request->industry_id){
			return Rfp::where('company_id', $request->search_field)->orWhere('industry_id', $request->industry_id);
		} elseif ($request->search_field) {
			return Rfp::where('company_id', $request->search_field);
		} else {
			return Rfp::where('industry_id', $request->industry_id);
		}
	}

	public static function homeRfps()
	{
		return Rfp::where('company_id', 1)->orderBy('deadline', 'desc')->get();
	}

	public static function profileRfps($company_id)
	{
		return Rfp::where('company_id', $company_id)->orderBy('deadline');
	}

	public static function grabWeekRfps()
	{
		$now = Carbon::now()->toDateTimeString();
		$week = Carbon::now()->addWeeks(1)->toDateTimeString();
		return Rfp::whereBetween('deadline', [$now, $week])->orderBy('deadline');
	}

	public static function grabMonthRfps()
	{
		$now = Carbon::now()->toDateTimeString();
		$month = Carbon::now()->addWeeks(4)->toDateTimeString();
		return Rfp::whereBetween('deadline', [$now, $month])->orderBy('deadline');
	}

	public static function grabYearRfps()
	{
		$now = Carbon::now()->toDateTimeString();
		$year = Carbon::now()->addYear();
		return Rfp::whereBetween('deadline', [$now, $year])->orderBy('deadline');
	}

	protected $dates = [
		'deadline',
		'contract_from_date',
		'contract_to_date'
	];

	public static $rules = [
		'project_title' => 'required|max:100',
		'deadline' => 'required|date_format:"Y-m-d"',
		'contact_name' => 'required|max:100',
		'contact_department' => 'required|max:100',
		'contact_no' => 'required|integer',
		'project_scope' => 'required|filled',
		'contract_from_date' => 'required|date_format:"Y-m-d"',
		'contract_to_date' => 'required|date_format:"Y-m-d"',
		'file' => 'file',
		'url' => 'required|url'
	];
}