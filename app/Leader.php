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
     'full_name' => 'max:100',
     'title' => 'max:100',
     'img' => 'image|required',
     'linkedin_url' => 'url'
   	];
}
