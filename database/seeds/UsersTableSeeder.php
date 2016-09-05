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
        ['first_name' => 'Janice', 'last_name' =>	'Mills', 'username' =>	'jmills0', 'email' =>	'jmills0@friendfeed.com', 'password' => 'vRmMtWhx', 'is_admin' => True],
        ['first_name' => 'Randi', 'last_name' =>	'Mays', 'username' =>	'randimays', 'email' =>	'randimays@codeup.com', 'password' => 'randimays', 'is_admin' => True],
        ['first_name' => 'Jay', 'last_name' =>	'Nichols', 'username' =>	'jaynichols', 'email' =>	'jaynichols@codeup.com', 'password' => 'jaynichols', 'is_admin' => True],
        ['first_name' => 'Anthony', 'last_name' =>	'Anthony', 'username' =>	'anthonym', 'email' =>	'anthonym@codeup.com', 'password' => 'anthonym', 'is_admin' => True],
        ['first_name' => 'Anne', 'last_name' =>	'Alexander', 'username' =>	'aalexander4', 'email' =>	'aalexander4@hatena.ne.jp', 'password' => 'fvnFvlfIGZ', 'is_admin' => False],
        ['first_name' => 'Terry', 'last_name' =>	'Powell', 'username' =>	'tpowell5', 'email' =>	'tpowell5@zdnet.com', 'password' => 'puzQ1X', 'is_admin' => False],
        ['first_name' => 'Christopher', 'last_name' =>	'Perez', 'username' =>	'cperez6', 'email' =>	'cperez6@usa.gov', 'password' => 'UszC1x', 'is_admin' => False],
        ['first_name' => 'Ruby', 'last_name' =>	'Ellis', 'username' =>	'rellis7', 'email' =>	'rellis7@berkeley.edu', 'password' => '3CwFB9W', 'is_admin' => False],
        ['first_name' => 'Willie', 'last_name' =>	'Medina', 'username' =>	'wmedina8', 'email' =>	'wmedina8@dion.ne.jp', 'password' => 'htg3Zymij2Rz', 'is_admin' => False]
      ];

      foreach ($users as $user) {
        	$new_user = new App\User();
        	$new_user->first_name = $user['first_name'];
          $new_user->last_name = $user['last_name'];
          $new_user->username = $user['username'];
          $new_user->email = $user['email'];
          $new_user->password = Hash::make($user['password']);
          $new_user->is_admin = $user['is_admin'];
        	$new_user->save();
    	}
    }
}
