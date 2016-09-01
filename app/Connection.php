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
}
