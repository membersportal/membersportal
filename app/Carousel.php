<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
	use SoftDeletes;

	public static $rules = [
		'title' => 'required|max:50',
		'desc' => 'required|max:150',
		'img' => 'image|required',
		'url' => 'required|url'
	];

	public function getDescAttribute($value)
	{
		return ucwords($value);
	}

	public function getTitleAttribute($value)
	{
		return ucwords($value);
	}

	public static function pullCarousels()
	{
		$carousels = Carousel::orderBy('created_at', 'desc')->take(2)->get();
		return $carousels;
	}
}
