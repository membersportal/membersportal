<?php

use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$industries = ["Accommodations", "Accounting", "Advertising", "Aerospace", "Agriculture & Agribusiness", "Air Transportation", "Apparel & Accessories", "Auto", "Architecture", "Banking", "Beauty & Cosmetics", "Biotechnology", "Chemical", "Communications", "Computer", "Construction", "Consulting", "Consumer Products", "Education", "Electronics", "Employment", "Energy", "Entertainment & Recreation", "Fashion", "Financial Services", "Fine Arts", "Food & Beverage", "Health", "Information", "Information Technology", "Insurance", "Journalism & News", "Legal Services", "Manufacturing", "Media & Broadcasting", "Medical Devices & Supplies", "Motion Pictures & Video", "Music", "Pharmaceutical", "Public Administration", "Public Relations", "Publishing", "Real Estate", "Retail", "Service", "Sports", "Technology", "Telecommunications", "Tourism", "Transportation", "Travel", "Utilities", "Video Game", "Web Services"];

    	foreach ($industries as $key => $industry) {
        	$industry . "{$key} + 1" = new Industry();
        	($industry . "{$key} + 1")->industry = $industries[$key];
        	($industry . "{$key} + 1")->save();
    	}
    }
}
