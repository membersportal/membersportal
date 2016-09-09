<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Company;

class Industry extends Model
{
	use SoftDeletes;

	public function companies()
	{
		return $this->hasMany(Company::class, 'industry_id');
	}

	public function rfps()
	{
		return $this->hasMany(Rfp::class, 'industry_id');
	}
    //
}
