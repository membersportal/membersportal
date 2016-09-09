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
		['user_id' => '1', 'name' => 'Codeup', 'industry_id' => '19', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Codeup is a San Antonio-based career accelerator that prepares people for a career as a software developer.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2013-01-01'],
['user_id' => '2', 'name' => 'Codeup1', 'industry_id' => '19', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Codeup is a San Antonio-based career accelerator that prepares people for a career as a software developer.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2013-01-01'],
['user_id' => '3', 'name' => 'Codeup2', 'industry_id' => '19', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Codeup is a San Antonio-based career accelerator that prepares people for a career as a software developer.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2013-01-01'],
['user_id' => '4', 'name' => 'Codeup3', 'industry_id' => '19', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Codeup is a San Antonio-based career accelerator that prepares people for a career as a software developer.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2013-01-01'],
['user_id' => '5', 'name' => 'Frost Bank', 'industry_id' => '10', 'profile_img' => 'frost_profile.jpeg', 'header_img' => 'frost_header.jpeg', 'desc' => 'Frost Bank is a Texas-chartered bank founded in 1868 and based in San Antonio, with 126 branches across the state. Frost is one of the largest Texas-based banks. The company offers a full range of commercial and consumer banking products, investment and brokerage services and insurance products to customers throughout Texas.', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => True, 'date_established' => '1868-01-01'],
['user_id' => '6', 'name' => 'San Antonio Current', 'industry_id' => '32', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'The San Antonio Current is a free weekly alternative newspaper in San Antonio, Texas, USA. The Current focuses on investigative journalism, political analysis, and critical coverage of local music and culture. It also contains extensive and up-to-date event listings for San Antonio.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '1986-01-01'],
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
