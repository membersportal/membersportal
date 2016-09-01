<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    public static function viewConnections($id)
    {
      $connections = Connection::where('company1_id', $id);
      return $connections;
    }

    public static function dashboardConnections($connections){
      $companies = [];

      foreach($connections as $connection){
        $company = $connection->company_id;
        $companies[] = $company;
      }
      return Connection::whereIn('company1_id', $companies)->orderBy('created_at');
    }
}
