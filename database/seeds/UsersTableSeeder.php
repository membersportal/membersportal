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
        ['first_name' => 'Willie', 'last_name' =>	'Medina', 'username' =>	'wmedina8', 'email' =>	'wmedina8@dion.ne.jp', 'password' => 'htg3Zymij2Rz', 'is_admin' => False],
        ['first_name' => 'Douglas', 'last_name' => 'Gordon' , 'username' => 'gdouglas1', 'email' => 'don0@prnewswire.com', 'password' => 'ajsdfor32', 'is_admin' => False],
        ['first_name' => 'Nicole', 'last_name' => 'Allen' , 'username' => 'nallen1', 'email' => 'nallen1@upenn.edu', 'password' => 'fdjoiidv28', 'is_admin' => False],
        ['first_name' => 'Wanda', 'last_name' => 'Butler' , 'username' => 'wbutler1', 'email' => 'wbutlerblair@cloudfare.com', 'password' => 'cvuiqouh84', 'is_admin' => False],
        ['first_name' => 'Nicole', 'last_name' => 'Allen' , 'username' => 'nallen1', 'email' => 'nallen1@upenn.edu', 'password' => 'fdjoiidv28', 'is_admin' => False],
        ['first_name' => 'Roy', 'last_name' => 'Allen' , 'username' => 'rallen1', 'email' => 'rallen1@utexas.edu', 'password' => 'gfjdopwefr9', 'is_admin' => False],
        ['first_name' => 'Roy', 'last_name' => 'Baker' , 'username' => 'nbaker1', 'email' => 'rbaker4@bandcamp.com', 'password' => 'ju709hufi', 'is_admin' => False],
        ['first_name' => 'Nicole', 'last_name' => 'Allen' , 'username' => 'nallen1', 'email' => 'nallen1@upenn.edu', 'password' => 'fdjoiidv28', 'is_admin' => False],
        ['first_name' => 'Margaret', 'last_name' => 'Patterson' , 'username' => 'Mpatterson1', 'email' => 'mpatterson5@pbs.org', 'password' => 'reqvadnuio4', 'is_admin' => False],
        ['first_name' => 'Pamela', 'last_name' => 'Morales' , 'username' => 'pmorales1', 'email' => 'pmorales6@samsung.com', 'password' => 'vjipqefj887', 'is_admin' => False],
        ['first_name' => 'Frances', 'last_name' => 'Vasquez' , 'username' => 'fvasquez1', 'email' => 'fvasquez7@twitpic.com', 'password' => 'rewuiv78923', 'is_admin' => False],
        ['first_name' => 'Pamela', 'last_name' => 'Morales' , 'username' => 'pmorales1', 'email' => 'pmorales6@samsung.com', 'password' => 'vjipqefj887', 'is_admin' => False],
        ['first_name' => 'Juan', 'last_name' => 'Ray' , 'username' => 'jray1', 'email' => 'jray8@cnet.com', 'password' => 'vavref8u', 'is_admin' => False],
        ['first_name' => 'Harold', 'last_name' => 'Nichols' , 'username' => 'hnichols1', 'email' => 'hnichols9@latimes.com', 'password' => 'cvijp98ij', 'is_admin' => False],
        ['first_name' => 'Carlos', 'last_name' => 'Bradley' , 'username' => 'cbradley1', 'email' => 'cbradleya@4shared.com', 'password' => 'vuioqefni86', 'is_admin' => False],


11,Carlos,Bradley,cbradleya@4shared.com,Male,146.33.193.3

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
