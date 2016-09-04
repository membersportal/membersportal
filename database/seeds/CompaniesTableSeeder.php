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
		['user_id' => '1', 'name' => 'Dablist', 'industry_id' => '42', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => '51-250', 'woman_owned' => False, 'contractor' => True, 'family_owned' => True, 'organization' => True, 'date_established' => '2015-12-25'],
		['user_id' => '2', 'name' => 'Skinte', 'industry_id' => '32', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => '251-500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => True, 'date_established' => '2015-12-25'],
		['user_id' => '3', 'name' => 'Browseblab', 'industry_id' => '4', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => '26-50', 'woman_owned' => False, 'contractor' => True, 'family_owned' => True, 'organization' => False, 'date_established' => '2015-12-25'],
		['user_id' => '4', 'name' => 'Skibox', 'industry_id' => '24', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => 'more_than_500', 'woman_owned' => True, 'contractor' => True, 'family_owned' => True, 'organization' => True, 'date_established' => '2015-12-25'],
		['user_id' => '5', 'name' => 'Skippad', 'industry_id' => '36', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => 'fewer_than_10', 'woman_owned' => False, 'contractor' => True, 'family_owned' => True, 'organization' => False, 'date_established' => '2015-12-25'],
		['user_id' => '6', 'name' => 'Jamia', 'industry_id' => '28', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => '51-250', 'woman_owned' => True, 'contractor' => False, 'family_owned' => True, 'organization' => False, 'date_established' => '2015-12-25'],
		['user_id' => '7', 'name' => 'Topicstorm', 'industry_id' => '37', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => '11-25', 'woman_owned' => True, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2015-12-25'],
		['user_id' => '8', 'name' => 'Vipe', 'industry_id' => '53', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => 'fewer_than_10', 'woman_owned' => True, 'contractor' => False, 'family_owned' => False, 'organization' => False, 'date_established' => '2015-12-25'],
		['user_id' => '9', 'name' => 'Brightbean', 'industry_id' => '9', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => 'more_than_500', 'woman_owned' => True, 'contractor' => True, 'family_owned' => True, 'organization' => True, 'date_established' =>	'2015-12-25']
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