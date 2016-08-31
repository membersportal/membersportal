<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        ['first_name' => 'Janice', 'last_name' =>	'Mills', 'username' =>	'jmills0', 'email' =>	'jmills0@friendfeed.com', 'password' => 'vRmMtWhx'],
        ['first_name' => 'Louise', 'last_name' =>	'George', 'username' =>	'lgeorge1', 'email' =>	'lgeorge1@cnbc.com', 'password' => 'QDqz2lhTEGm'],
        ['first_name' => 'Ruby', 'last_name' =>	'Fisher', 'username' =>	'rfisher2', 'email' =>	'rfisher2@technorati.com', 'password' => 'dqAFkcJ'],
        ['first_name' => 'Judith', 'last_name' =>	'Nguyen', 'username' =>	'jnguyen3', 'email' =>	'jnguyen3@list-manage.com', 'password' => 'Yb8LVdikFzle'],
        ['first_name' => 'Anne', 'last_name' =>	'Alexander', 'username' =>	'aalexander4', 'email' =>	'aalexander4@hatena.ne.jp', 'password' => 'fvnFvlfIGZ'],
        ['first_name' => 'Terry', 'last_name' =>	'Powell', 'username' =>	'tpowell5', 'email' =>	'tpowell5@zdnet.com', 'password' => 'puzQ1X'],
        ['first_name' => 'Christopher', 'last_name' =>	'Perez', 'username' =>	'cperez6', 'email' =>	'cperez6@usa.gov', 'password' => 'UszC1x'],
        ['first_name' => 'Ruby', 'last_name' =>	'Ellis', 'username' =>	'rellis7', 'email' =>	'rellis7@berkeley.edu', 'password' => '3CwFB9W'],
        ['first_name' => 'Willie', 'last_name' =>	'Medina', 'username' =>	'wmedina8', 'email' =>	'wmedina8@dion.ne.jp', 'password' => 'htg3Zymij2Rz']
      ];

      foreach ($users as $user) {
        	$new_user = new App\User();
        	$new_user->first_name = $user['first_name'];
          $new_user->last_name = $user['last_name'];
          $new_user->username = $user['username'];
          $new_user->email = $user['email'];
          $new_user->password = Hash::make($user['password']);
        	$new_user->save();
    	}
    }
}
