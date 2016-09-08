<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;

class Rfp extends Model
{
	use SoftDeletes;

	public function company()
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

	public static function homeRfps()
	{
		return Rfp::where('company_id', 1)->orderBy('deadline', 'desc')->get();
	}

	public static function profileRfps($company_id)
	{
		return Rfp::where('company_id', $company_id)->orderBy('deadline');
	}

	public static $rules = [
     'project_title' => 'required|max:100',
     'deadline' => 'required|date_format:"Y-m-d"',
     'contact_name' => 'required|max:100',
     'contact_department' => 'required|max:100',
     'contact_no' => 'required|integer',
     'project_scope' => 'required|filled',
     'contract_from_date' => 'required|date_format:"Y-m-d"',
     'contract_to_date' => 'required|date_format:"Y-m-d"',
     'file' => 'file|nullable',
     'url' => 'required|url'
   	];
}
