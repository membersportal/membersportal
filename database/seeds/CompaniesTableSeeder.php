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
		['user_id' => '1', 'name' => 'Dablist', 'industry_id' => '42', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '', 'size' => '11-25', 'woman_owned' => False, 'contractor' => True, 'family_owned' => True, 'organization' => True, 'date_established' => '2015-12-25'],
['user_id' => '2', 'name' => 'The Law Office of Dustin Whittenburg', 'industry_id' => '33', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'Mr. Whittenburg has earned an LL.M. in the field of taxation and has many years of tax law experience. He has worked on many complex tax planning issues, including advice for non-profit organizations and federal and state tax controversies. ', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2008-01-01'],
['user_id' => '3', 'name' => '4M Realty', 'industry_id' => '43', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => '4M Realty Company, a full-service real estate brokerage company, is an affiliate of 4M Properties, Inc. a San Antonio based, 45 year-old diversified real estate company which has built and managed or sold over $1 Billion dollars of real estate in 44 cities and 16 states.', 'size' => '26-50', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => False, 'date_established' => '1983-01-01'],
['user_id' => '4', 'name' => 'Mancha Roofing', 'industry_id' => '17', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'We provide complete roofing service, including roof inspection, new roof installation, roof repair, and roof replacement. Our roofing contractors are friendly, experienced, and knowledgeable.', 'size' => '51-250', 'woman_owned' => False, 'contractor' => True, 'family_owned' => True, 'organization' => True, 'date_established' => '2002-01-01'],
['user_id' => '5', 'name' => 'Frost Bank', 'industry_id' => '10', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'Frost Bank is a Texas-chartered bank founded in 1868 and based in San Antonio, with 126 branches across the state. Frost is one of the largest Texas-based banks.[1]The company offers a full range of commercial and consumer banking products, investment and brokerage services and insurance products to customers throughout Texas.', 'size' => 'more than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => True, 'date_established' => '1868-01-01'],
['user_id' => '6', 'name' => 'San Antonio Current', 'industry_id' => '32', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'The San Antonio Current is a free weekly alternative newspaper in San Antonio, Texas, USA. The Current focuses on investigative journalism, political analysis, and critical coverage of local music and culture. It also contains extensive and up-to-date event listings for San Antonio.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '1986-01-01'],
['user_id' => '7', 'name' => 'Valero', 'industry_id' => '22', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'Valero Energy Corporation is a Fortune 500 international manufacturer and a marketer of transportation fuels, other petrochemical products, and power.', 'size' => 'more than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '1980-01-01'],
['user_id' => '8', 'name' => 'Muñoz and Company', 'industry_id' => '9', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'Muñoz and Company is one of the largest minority-owned (MBE) design firms in Texas.  Founded in 1927, Muñoz and Company is recognized for its public architecture derived from cultural expression.', 'size' => '51-250', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => False, 'date_established' => '1927-01-01'],
['user_id' => '9', 'name' => 'Kinetic Concepts', 'industry_id' => '36', 'profile_img' => 'profile_photo_template.png', 'header_img' => '', 'desc' => 'Kinetic Concepts, Inc., (KCI) is a global corporation that produces medical technology related to wounds and wound healing. KCI produced the first product developed specifically for negative pressure wound therapy', 'size' => 'more than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' =>  '1976-06-01'],
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