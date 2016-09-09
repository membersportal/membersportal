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

	public static function checkForConnection($id1, $id2)
	{
		$connections = Connection::where('company1_id', $id1)->orWhere('company2_id', $id1)->get();
		foreach ($connections as $connection) {
			$one = $connection->company1_id;
			$two = $connection->company2_id;
			if (($id1 == $one && $id2 == $two) || ($id2 == $one && $id1 == $two)) {
				return $connection->id;
			}
		}
			return null;
	}

	public static function connectionsCount($id)
	{
		$connections = Connection::getConnectionsIds($id);
		$count = count($connections);
		return $count;
	}

	public static function getConnectionsIds($id)
	{
		$connections = Connection::where('company1_id', $id)->orWhere('company2_id', $id)->orderBy('created_at')->get();
		$ids = [];
		foreach ($connections as $connection) {
			if ($connection->company1_id != $id) {
				$ids[] = $connection->company1_id;
			} elseif ($connection->company2_id != $id) {
				$ids[] = $connection->company2_id;
			}
		}
		$ids = array_unique($ids, SORT_NUMERIC);
		return $ids;
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