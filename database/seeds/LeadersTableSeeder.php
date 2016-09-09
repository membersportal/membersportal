<?php

use Illuminate\Database\Seeder;

class LeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $leaders = [
        ['company_id' => '5', 'full_name' =>	'Phillip D. Green', 'title' =>	'jmills0', 'img' =>	'phillip_green_frost.jpeg', 'linkedin_url' => ''],
        ['company_id' => '5', 'full_name' =>	'Paul Bracher', 'title' =>	'Chairman, CEO', 'img' =>	'', 'linkedin_url' => ''],
        ['company_id' => '5', 'full_name' =>	'Jerry Salinas', 'title' =>	'President, CBO', 'img' =>	'', 'linkedin_url' => ''],
        ['company_id' => '11', 'full_name' => 'Taylor Rhodes' , 'title' => 'CEO', 'img' => 'taylor-rhodes_rackspace.jpg', 'linkedin_url' => ''],
        ['company_id' => '11', 'full_name' => 'Alex Pinchev' , 'title' => 'Executive VP', 'img' => 'alex_pinchev_rackspace.jpg', 'linkedin_url' => ''],
        ['company_id' => '11', 'full_name' => 'Jeff Cotten' , 'title' => 'SVP, General Manager', 'img' => 'jeff_cotten_rackspace.jpeg', 'linkedin_url' => ''],
        ['company_id' => '9', 'full_name' => 'James Leininger' , 'title' => 'Founder', 'img' => 'james-leininger_kintetic.jpeg', 'linkedin_url' => ''],
        ['company_id' => '9', 'full_name' => 'Terry Neimeyer' , 'title' => 'CEO', 'img' => 'Terry-Neimeyer_kinetic.jpeg', 'linkedin_url' => 'https://www.linkedin.com/in/terry-neimeyer-96513b15'],
        ['company_id' => '9', 'full_name' => 'Nathan Beil' , 'title' => 'President', 'img' => '', 'linkedin_url' => 'https://www.linkedin.com/in/nate-beil-436b08a'],
        ['company_id' => '12', 'full_name' => 'Adam Hamilton' , 'title' => 'President', 'img' => 'AdamHamilton_swri.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/adam-hamilton-p-e-2639a424'],
        ['company_id' => '12', 'full_name' => 'James L. Burch' , 'title' => 'VP of Space, Science and Engineering', 'img' => 'burch_james_swri.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/jim-burch-3558806'],
        ['company_id' => '12', 'full_name' => 'Alan Stern' , 'title' => 'Associate VP', 'img' => 'Alan_stern_swri.jpg', 'linkedin_url' => '']
      ];

      foreach ($leaders as $leader) {
          $new_leader = new App\Leader();
          $new_leader->company_id = $leader['company_id'];
          $new_leader->full_name = $leader['full_name'];
          $new_leader->title = $leader['title'];
          $new_leader->img = $leader['img'];
          $new_leader->linkedin_url = $leader['linkedin_url'];

          $new_leader->save();
      }
    }
}
