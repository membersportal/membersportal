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
['user_id' => '7', 'name' => 'Valero', 'industry_id' => '22', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Valero Energy Corporation is a Fortune 500 international manufacturer and a marketer of transportation fuels, other petrochemical products, and power.', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '1980-01-01'],
['user_id' => '8', 'name' => 'Muñoz and Company', 'industry_id' => '9', 'profile_img' => 'munoz_profile.jpg', 'header_img' => 'munoz_header.jpg', 'desc' => 'Muñoz and Company is one of the largest minority-owned (MBE) design firms in Texas.  Founded in 1927, Muñoz and Company is recognized for its public architecture derived from cultural expression.', 'size' => '51-250', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => False, 'date_established' => '1927-01-01'],
['user_id' => '9', 'name' => 'Kinetic Concepts', 'industry_id' => '36', 'profile_img' => 'kinetic_profile.jpeg', 'header_img' => 'kinetic_heaer.png', 'desc' => 'Kinetic Concepts, Inc., (KCI) is a global corporation that produces medical technology related to wounds and wound healing. KCI produced the first product developed specifically for negative pressure wound therapy', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' =>  '1976-06-01'],
['user_id' => '10', 'name' => 'Trilogy Pizza', 'industry_id' => '27', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'North-Side Italian bistro', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => False, 'date_established' => '2014-08-12'],
['user_id' => '11', 'name' => 'Rackspace', 'industry_id' => '30', 'profile_img' => 'rackspace_profile.jpeg', 'header_img' => 'rackspace_header.jpeg', 'desc' => 'Rackspace engineers deliver specialized expertise, and easy-to-use tools for leading technologies developed by AWS, Google, Microsoft, OpenStack, VMware and others. ', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => False, 'date_established' => '1998-02-09'],
['user_id' => '12', 'name' => 'Southwest Research Institute', 'industry_id' => '12', 'profile_img' => 'swri_profile.jpg', 'header_img' => 'swri_header.jpg', 'desc' => 'SwRI offers a wide range of technical expertise and services in such areas as chemistry, space science, nondestructive evaluation, automation, engine design, mechanical engineering, electronics and more.', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => false, 'family_owned' => False, 'organization' => True, 'date_established' => '1947-01-01'],
['user_id' => '13', 'name' => 'SWBC', 'industry_id' => '31', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'SWBC is an international financial services company providing a wide range of insurance, mortgage, and investment services to businesses, families, and financial institutions. W', 'size' => 'More Than 500', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '1976-04-01'],
['user_id' => '14', 'name' => 'Guitar Tex', 'industry_id' => '44', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Guitar sales and repair', 'size' => 'Fewer Than 10', 'woman_owned' => False, 'contractor' => False, 'family_owned' => True, 'organization' => False, 'date_established' => '1999-01-01'],
['user_id' => '15', 'name' => 'Designer Glitz and Glamour', 'industry_id' => '11', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'We are a progressive, innovative and highly educated salon leader in the San Antonio area.', 'size' => '11-25', 'woman_owned' => True, 'contractor' => False, 'family_owned' => False, 'organization' => False, 'date_established' => '2007-01-01'],
['user_id' => '16', 'name' => 'Clay Casa', 'industry_id' => '26', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => "Since 2001 Clay Casa has been San Antonio's top stop for pottery painting fun, mosaics and birthday parties.", 'size' => 'Fewer Than 10', 'woman_owned' => True, 'contractor' => False, 'family_owned' => True, 'organization' => False, 'date_established' => '2001-01-01'],
['user_id' => '17', 'name' => 'Allergy Institute of San Antonio', 'industry_id' => '28', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'We are a family-oriented allergy clinic that is dedicated to relieving your symptoms and creating a preventative plan that will keep your allergic reactions under control', 'size' => 'Fewer Than 10', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => False, 'date_established' => '2011-09-26'],
['user_id' => '18', 'name' => 'The MAX', 'industry_id' => '8', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => '', 'size' => '11-25', 'woman_owned' => False, 'contractor' => True, 'family_owned' => False, 'organization' => False, 'date_established' =>    '2008-01-04'],
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
