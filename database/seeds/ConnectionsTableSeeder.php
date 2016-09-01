<?php

use Illuminate\Database\Seeder;

class ConnectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
   	{
   	  $connections = [
   		['company1_id' => '2', 'company2_id' => '3'],
   		['company1_id' => '2', 'company2_id' => '7'],
      ['company1_id' => '4', 'company2_id' => '7'],
   		['company1_id' => '5', 'company2_id' => '2'],
      ['company1_id' => '5', 'company2_id' => '3'],
   		['company1_id' => '5', 'company2_id' => '6'],
      ['company1_id' => '5', 'company2_id' => '8']
   	  ];

       //s$industries = App\Industry::all();
       //$totalIndustries = $industries->count();
       //$i = 0;
       foreach ($connections as $connection) {
           $new_connection = new App\Connection();
           $new_connection->company1_id = $connection['company1_id'];
           $new_connection->company2_id = $connection['company2_id'];
           $new_connection->save();
           // $i = $i % $totalIndustries;
      }
    }
}
