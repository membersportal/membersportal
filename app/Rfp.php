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
		return $this->belongsTo(Company::class, 'id');
	}

	public static $rules = [
     'title' => 'required|max:100',
     'deadline' => 'required|date',
     'contact_name' => 'required|max:100',
     'contact_department' => 'required|max:100',
     'contact_no' => 'required|integer',
     'project_scope' => 'required|filled',
     'contract_from_date' => 'required|date',
     'contract_to_date' => 'required|date',
     'url' => 'required|url'
   	];

    //
}
