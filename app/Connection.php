<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Company;

class Connection extends Model
{
	use SoftDeletes;

	public function company()
	{
		return $this->belongsTo(Company::class, 'company1_id');
	}

	public static function viewConnections($id)
	{
		$connections = Connection::where('company1_id', $id);
		return $connections;
	}

	public static function dashboardConnections($connections){
		$companies = [];

		foreach($connections as $connection){
			$company = $connection->id;
			$companies[] = $company;
		}
		return Connection::whereIn('company1_id', $companies)->orderBy('created_at');
	}
}
