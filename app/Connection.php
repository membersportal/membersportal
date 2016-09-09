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

	public static function getExistingConnectionId($viewee, $viewer)
	{
		$viewee_connections = Connection::where('company1_id', $viewee)->orWhere('company2_id', $viewee)->whereNull('deleted_at')->get();
		foreach ($viewee_connections as $viewee_connection) {
			$a = $viewee_connection->company1_id;
			$b = $viewee_connection->company2_id;
			if (($viewee == $a && $viewer == $b) || ($viewer == $a && $viewee == $b)) {
				return $viewee_connection->id;
			}
		}
		return null;
	}

	public static function connectionsCount($id)
	{
		$part_1 = Connection::where('company1_id', $id)->whereNull('deleted_at')->count();
		$part_2 = Connection::where('company2_id', $id)->whereNull('deleted_at')->count();
		return $part_1 + $part_2;
	}

	public static function getArrayOfConnectionsIds($id)
	{
		$connections = Connection::where('company1_id', $id)->orWhere('company2_id', $id)->whereNull('deleted_at')->orderBy('created_at')->get();
		$ids = [];
		foreach ($connections as $connection) {
				$ids[] = $connection->company1_id;
				$ids[] = $connection->company2_id;
		}
		$unique_ids = array_unique($ids, SORT_NUMERIC);
		$self_location = array_search($id, $ids);
		unset($unique_ids[$self_location]);
		return $unique_ids;
	}

	public static function dashboardConnections($connections){
		$companies = [];

		foreach($connections as $connection) {
			$company = $connection->id;
			$companies[] = $company;
		}
		return Connection::whereIn('company1_id', $companies)->orderBy('created_at');
	}
}