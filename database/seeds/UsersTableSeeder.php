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
        ['first_name' => 'Members', 'last_name' =>	'Portal', 'username' =>	'admin', 'email' =>	'admin@members-portal.com', 'password' => 'password', 'is_admin' => True],
        ['first_name' => 'Randi', 'last_name' =>	'Mays', 'username' =>	'randimays', 'email' =>	'randimays@codeup.com', 'password' => 'password', 'is_admin' => False],
        ['first_name' => 'Jay', 'last_name' =>	'Nichols', 'username' =>	'jaynichols', 'email' =>	'jaynichols@galapa-go.com', 'password' => 'password', 'is_admin' => False],
        ['first_name' => 'Anthony', 'last_name' =>	'Martinez', 'username' =>	'anthonym', 'email' =>	'anthonym@college-go.com', 'password' => 'password', 'is_admin' => False],
        ['first_name' => 'Jason', 'last_name' =>	'Alexander', 'username' =>	'jalexander4', 'email' =>	'jason@athlead.com', 'password' => 'password', 'is_admin' => False],
        ['first_name' => 'Terry', 'last_name' =>	'Powell', 'username' =>	'tpowell5', 'email' =>	'tpowell5@publishing.com', 'password' => 'password', 'is_admin' => False]
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
