<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;
use App\Contact;
use App\Connection;

class User extends Model implements AuthenticatableContract,
									AuthorizableContract,
									CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function company()
	{
		return $this->hasOne(Company::class, 'user_id');
	}

	public function contact()
	{
		return $this->hasOne(Contact::class, 'user_id');
	}

	public function getFirstNameAttribute($value)
	{
		return ucwords($value);
	}

	public function getLastNameAttribute($value)
	{
		return ucwords($value);
	}

	public static function searchUser($request)
	{
		$query = User::where('email', "$request->searchField");
		//(get_class_methods(get_class($query)));
		// echo $query->getQuery()->toSql();
		return $query->first();
	}

	public static $rules = [
		'first_name' => 'required|max:100',
		'last_name' => 'required|max:100',
		'username' => 'required|max:32',
		'email'   => 'required|email',
		'password' => 'required|max:100'
	];

}