<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

	public static $rules = [
		'heading' => 'required|max:250',
		'subheading' => 'required|max:250',
		'desc' => 'required|max:500',
		'img' => 'required|image',
		'url' => 'required|url'
	];

	public function getHeadingAttribute($value)
	{
		return ucwords($value);
	}

	public function getSubheadingAttribute($value)
	{
		return ucwords($value);
	}
}
