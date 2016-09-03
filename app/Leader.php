<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;

class Leader extends Model
{
	use SoftDeletes;

	public function company()
	{
		return $this->belongsTo(Company::class, 'id');
	}

	public function getFullNameAttribute($value)
	{
		return ucwords($value);
	}

	public function getTitleAttribute($value)
	{
		return ucwords($value);
	}

	public static $rules = [
     'full_name' => 'required|max:100',
     'title' => 'required|max:100',
     'img' => 'required|image',
     'linkedin_url' => 'required|url'
   	];
    //
}
