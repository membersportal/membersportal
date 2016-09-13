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
        ['company_id' => '1', 'full_name' => 'Anthony Martinez', 'title' => 'Developer/Designer', 'img' => 'anthonymartinez.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/anthony_martinez'],
        ['company_id' => '1', 'full_name' => 'Jay Nichols', 'title' => 'Developer/Designer', 'img' => 'jaynichols.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/jay-nichols'],
        ['company_id' => '1', 'full_name' => 'Randi Mays', 'title' => 'Developer/Designer', 'img' => 'randimays.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/randimays'],
        ['company_id' => '2', 'full_name' => 'Michael Girdley', 'title' => 'COB/Founder', 'img' => 'michael_girdley-codeup.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/michaelgirdley'],
        ['company_id' => '2', 'full_name' => 'Jason Straughan', 'title' => 'Founder', 'img' => 'jason-straughan_codeup.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/jdstraughan'],
        ['company_id' => '2', 'full_name' => 'Chris Turner', 'title' => 'Founder', 'img' => 'chris_turner-codeup.jpg', 'linkedin_url' => 'https://www.linkedin.com/in/cturner80']
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
