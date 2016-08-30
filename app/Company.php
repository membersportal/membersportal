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

	public function users()
	{
		return $this->hasOne(User::class, 'id');
	}

	public function events()
	{
		return $this->hasMany(Event::class, 'company_id');
	}

	public function industries()
	{
		return $this->belongsTo(Industry::class, 'id');
	}

	public function leaders()
	{
		return $this->hasMany(Leader::class, 'id');
	}

	public static $rules = [
     'name' => 'required|max:120',
     'industry_id' => 'required|integer',
     'profile_img' => 'nullable|image',
     'header_img' => 'nullable|image',
     'desc' => 'nullable|filled',
     'female_owned' => 'required|boolean',
     'freelance' => 'required|boolean',
     'organization' => 'required|boolean'
   	];
    //
}
