<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$article1 = new Article();
		$article1->heading = "Airline grounding San Antonio flights to two U.S. cities";
		$article1->subheading = "";
		$article1->date = "2016-09-02";
		$article1->url = "http://www.bizjournals.com/sanantonio/news/2016/09/02/airline-grounding-san-antonio-flights-to-two-u-s.html";
		$article1->desc = "The decision by Frontier Airlines to return to San Antonio after a multi-year hiatus was hailed as an endorsement of the market’s business strength, but less than four months later, the carrier is preparing to scale back service to and from the Alamo City.";
		$article1->img = "frontier1-750xx2594-1461-0-156.jpg";
		$article1->save();

		$article2 = new Article();
		$article2->heading = "A peek into Rackspace’s intellectual property as the company goes private";
		$article2->subheading = "";
		$article2->date = "2016-09-02";
		$article2->url = "http://www.bizjournals.com/sanantonio/news/2016/09/02/a-peek-into-rackspace-s-intellectual-property-as.html";
		$article2->desc = "Rackspace Hosting Inc. is making a big bet on corporate clients moving operations into the cloud. Here's a look into its patents on file that may secure its future to do that.";
		$article2->img = "rackspace27-750xx3185-4246-48-0.jpg";
		$article2->save();

		$article3 = new Article();
		$article3->heading = "San Antonio businesses sharing data to curb digital threats";
		$article3->subheading = "";
		$article3->date = "2016-09-01";
		$article3->url = "http://www.bizjournals.com/sanantonio/news/2016/09/01/san-antonio-businesses-sharing-data-to-curb.html";
		$article3->desc = "In an effort to reduce the impact of security breaches across a region or within an industry cluster, there are information sharing organizations where businesses offer raw data across the board for analysis.";
		$article3->img = "smithgregsaroper080312-750xx309-174-0-1.jpg";
		$article3->save();

		$article4 = new Article();
		$article4->heading = "Six Flags management shift means new leadership for SA theme park";
		$article4->subheading = "";
		$article4->date = "2016-09-01";
		$article4->url = "http://www.bizjournals.com/sanantonio/news/2016/09/01/six-flags-management-shift-means-new-leadership.html";
		$article4->desc = "Six Flags Fiesta Texas is undergoing more change in its top leadership. Jeffrey Siebert has taken over as the new president of the San Antonio theme park. Siebert replaces Neal Thurman, who has left San Antonio to fill the park president position at Six Flags Great Adventure & Hurricane Harbor in New Jersey. That position had previously been held by John Fitzgerald for the last several years.";
		$article4->img = "dsc8543-750xx4492-2527-0-29.jpg";
		$article4->save();

		$article5 = new Article();
		$article5->heading = "Fast-casual restaurant chain's newest location – a Target parking lot";
		$article5->subheading = "";
		$article5->date = "2016-08-31";
		$article5->url = "http://www.bizjournals.com/sanantonio/news/2016/08/31/fast-casual-restaurant-chains-newest-location-a.html";
		$article5->desc = "High-traffic, desirable pad sites are in short supply these days, and there's no better example than the newest location for Zoe's Kitchen.";
		$article5->img = "zoes-kitchen-750xx1221-687-0-15.jpg";
		$article5->save();
	}
}