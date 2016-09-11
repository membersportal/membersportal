<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	  $companies = [
		['user_id' => '1', 'name' => 'Nope', 'industry_id' => '19', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Bacon ipsum dolor sit amet salami jowl corned beef, andouille flank tongue ball tip kielbasa pastrami tri-tip meatloaf short loin beef biltong. Cow bresaola ground round strip steak fatback meatball shoulder leberkas pastrami sausage corned beef t-bone pork belly drumstick', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2013-01-01'],
['user_id' => '2', 'name' => 'Codeup', 'industry_id' => '19', 'profile_img' => 'codeup.jpg', 'header_img' => 'codeup.jpg', 'desc' => 'In late 2013, Codeup’s three co-founders – Michael Girdley, Jason Straughan, and Chris Turner – noticed many of their fellow programmers and entrepreneurs were having a tough time finding quality software developers to grow their businesses. After some brainstorming and researching, the trio decided to open San Antonio’s first coding career accelerator with the mission of changing people’s lives through immersive software development education.
    The three co-founders rounded up a dedicated group of instructors and staff members and created a space in San Antonio where people can learn programming in a supportive, creative environment.
    The Codeup team hopes to make their corner of the world a little better by solving a big, meaningful problem for the community and the country — one person at a time..', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2013-01-01'],
['user_id' => '3', 'name' => 'Galapago', 'industry_id' => '47', 'profile_img' => 'health.jpg', 'header_img' => 'health.jpg', 'desc' => 'Bacon ipsum dolor amet t-bone id swine velit consectetur voluptate sint exercitation et app esse. Cow aliquip strip steak voluptate software ribeye eiusmod nostrud hamburger doner officia pork loin porchetta sausage medical. Turducken dolore landjaeger venison cupidatat. Sint excepteur reprehenderit, labore occaecat venison ribeye consectetur fugiat drumstick short free. Chuck beef picanha, incididunt dolore pork chop fatback labore ham. Velit brisket frankfurter pork landjaeger eiusmod.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2016-08-29'],
['user_id' => '4', 'name' => 'College Go', 'industry_id' => '45', 'profile_img' => 'education.jpg', 'header_img' => 'education.jpg', 'desc' => 'Lomo tattooed XOXO, fixie kogi hella shabby chic taxidermy cornhole. DIY education marfa, ethical copper mug dreamcatcher skateboard. Godard cred knausgaard software 8-bit, schlitz fingerstache chia selfies college semiotics leggings you probably app heard of them pug vice. Before they sold out subway tile craft beer chartreuse, yuccie cliche unicorn chicharrones 3 wolf moon retro. Blog ramps selfies, af edison bulb wolf fixie air plant pabst succulents man bun kickstarter. Air plant umami vice chambray humblebrag. Af slow-carb butcher quinoa etsy jean shorts, yuccie fanny pack meditation messenger bag celiac waistcoat disrupt gochujang.', 'size' => '11-25', 'woman_owned' => True, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2016-08-29'],
['user_id' => '5', 'name' => 'Fitwager', 'industry_id' => '45', 'profile_img' => 'fitness.jpg', 'header_img' => 'fitness.jpg', 'desc' => 'Pineconefish Pacific argentine jawfish queen danio sleeper shark spiny eel yellow jack cuckoo wrasse: exercise. Wallago pilchard sweeper, zebra tilapia zebrafish Pacific salmon bullhead shark mahi-mahi. fitbit bullhead shark spiny basslet thornfish: stingfish fitness carps swampfish upside-down catfish cutlassfish dojo loach whalefish. Wahoo molly--channel bass tube-eye bluntnose knifefish saw shark.', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => True, 'date_established' => '2016-08-29'],
['user_id' => '6', 'name' => 'San Antonio Report', 'industry_id' => '32', 'profile_img' => 'newspaper.jpg', 'header_img' => 'newspaper.jpg', 'desc' => 'Bacon ipsum dolor sit amet salami jowl corned beef, andouille flank tongue ball tip journalism pastrami tri-tip meatloaf short loin beef biltong. Cow bresaola ground round free steak fatback newspaper shoulder leberkas alternative sausage corned beef t-bone pork belly drumstick', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => True, 'date_established' => '1986-01-01'],
	  ];

    //s$industries = App\Industry::all();
    //$totalIndustries = $industries->count();
    //$i = 0;
    foreach ($companies as $company) {
        $new_company = new App\Company();
        $new_company->user_id = $company['user_id'];
        $new_company->name = $company['name'];
        $new_company->industry_id = $company['industry_id'];// $industries[$i]->id;
        $new_company->profile_img = $company['profile_img'];
        $new_company->header_img = $company['header_img'];
        $new_company->desc = $company['desc'];
        $new_company->size = $company['size'];
        $new_company->woman_owned = $company['woman_owned'];
        $new_company->contractor = $company['contractor'];
        $new_company->family_owned = $company['family_owned'];
        $new_company->organization = $company['organization'];
        $new_company->date_established = $company['date_established'];
        $new_company->save();
        // $i = $i % $totalIndustries;
      }
    }
}
