<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;

class Event extends Model
{
	use SoftDeletes;

	public function companies()
	{
		return $this->belongsTo(Company::class, 'company_id');
	}

	public static $rules = [
     'title' => 'required|max:75',
     'desc' => 'required|filled',
     'from_date' => 'required|date',
     'to_date' => 'required|date',
     'invite_only' => 'required|boolean',
     'rsvp_required' => 'required|boolean',
     'url' => 'required|url'
   	];
    //
}
