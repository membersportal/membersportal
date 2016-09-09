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
['user_id' => '5', 'name' => 'Grok', 'industry_id' => '45', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Bacon ipsum dolor amet salami shank meatloaf internet pancetta software service pork tri-tip capicola landjaeger pig account chuck. Website venison ground round boudin spare ribs, pig corned loan porchetta tail jerky shank turducken sirloin chicken salami. Pork chop boudin ground round beef ribs swine, bacon hamburger cow porchetta landjaeger pork loin short loin pig drumstick. Tri-tip kevin ham salami fatback. Alcatra bacon t-bone meatloaf, shoulder swine ball tip pork belly shank flank.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '2014-01-01'],
['user_id' => '6', 'name' => 'San Antonio Current', 'industry_id' => '32', 'profile_img' => 'profile_photo_template.png', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Unicorn humblebrag polaroid thundercats, organic kogi tousled. Semiotics vaporware mumblecore, fingerstache raw journalism hashtag portland food truck. Af chia semiotics, cred pok pok blog newspaper keffiyeh succulents neutra kogi food truck pug. Alternative hell of fixie kinfolk, polaroid chillwave meggings church-key. Irony slow-carb air plant, tilde kitsch bespoke edison free. Semiotics banjo mlkshk, prism pickled vape before they sold out street art mumblecore lo-fi. Fashion axe yuccie tousled glossier pinterest sriracha woke brooklyn, slow-carb gentrify pug chambray heirloom before they sold out swag.', 'size' => '11-25', 'woman_owned' => False, 'contractor' => False, 'family_owned' => False, 'organization' => True, 'date_established' => '1986-01-01'],
['user_id' => '7', 'name' => 'Galapago', 'industry_id' => '47', 'profile_img' => 'profile_photo', 'header_img' => 'header_photo_template.jpg', 'desc' => 'Turnip greens yarrow ricebean software endive cauliflower sea lettuce kohlrabi amaranth water spinach avocado daikon napa cabbage asparagus winter medical kale. app potato scallion desert raisin horseradish spinach carrot soko. Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard free pumpkin onion chickpea gram corn pea. Brussels sprout coriander water chestnut gourd swiss chard wakame kohlrabi beetroot carrot watercress. Corn amaranth salsify bunya nuts nori azuki bean chickweed potato bell pepper artichoke.', 'size' => 'More Than 500', 'woman_owned' => True, 'contractor' => True, 'family_owned' => False, 'organization' => True, 'date_established' => '2016-08-29'],
['user_id' => '8', 'name' => 'College Go', 'industry_id' => '19', 'profile_img' => 'munoz_profile.jpg', 'header_img' => 'munoz_header.jpg', 'desc' => '', 'size' => '51-250', 'woman_owned' => True, 'contractor' => False, 'family_owned' => True, 'organization' => False, 'date_established' => '2016-08-29'],
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
