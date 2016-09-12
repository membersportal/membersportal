<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			$events = [
				['company_id' => 6, 'industry_id' => '32', 'title' =>	'Transpo 2016', 'desc' =>	'Exposition for integrating from bicycles to connected vehicles', 'from_date' =>	'2016-11-13', 'to_date' => '2016-11-16', 'invite_only' => False, 'rsvp_required' => False, 'url' => "http://www.codeup.com", 'img' => 'transpo.jpg'],
				['company_id' => 3, 'industry_id' => '28', 'title' =>	'The American Society for Nondestructive Testing', 'desc' =>	"Trade show in Long Beach, California", 'from_date' =>	'2016-10-23', 'to_date' => '2016-10-27', 'invite_only' => False, 'rsvp_required' => False, 'url' => "http://www.codeup.com", 'img' => 'testing.png'],
				['company_id' => 3, 'industry_id' => '28', 'title' =>	'V.A.C. Veraflow Training', 'desc' =>	"Training for our new V.A.C. Veraflow machine will be held on 11-06-2016 in the R&D lab.", 'from_date' =>	'2016-11-06', 'to_date' => '2016-11-11', 'invite_only' => True, 'rsvp_required' => False, 'url' => 'https://www.kci-medical.com/veraflowtraining', 'img' => 'medical.jpg'],
				['company_id' => 2, 'industry_id' => '47', 'title' =>	'Open House', 'desc' =>	'We want to get to know you! Meet (and greet) our instructors as they lead you on a free tour of our classrooms. Refreshments will be served afterwards. Open to the public.', 'from_date' =>	'2016-11-11', 'to_date' => '2016-11-11', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'http://www.codeup.com', 'img' => 'open_house.png'],
				['company_id' => 2, 'industry_id' => '47', 'title' =>	'Openstack Summit Barcelona', 'desc' =>	"The OpenStack Summit is the most important gathering of IT leaders, telco operators, cloud administrators, app developers and OpenStack contributors building the future of cloud computing. Hear business cases and operational experience directly from users, learn about new products in the ecosystem and participate in hands-on workshops to build your skills.", 'from_date' =>	'2016-10-24', 'to_date' => '2016-10-28', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'https://www.openstack.org/summit/barcelona-2016/', 'img' => 'summit.jpg'],
				['company_id' => 5, 'industry_id' => '28', 'title' =>	'Halloween Fun-Run', 'desc' =>	"5K charitable run for Leukemia/Lymphoma Association. Get active!", 'from_date' =>	'2016-10-31', 'to_date' => '2016-10-31', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'http://www.codeup.com', 'img' => 'run.jpg'],
				['company_id' => 1, 'industry_id' => '14', 'title' =>	'C-Suite', 'desc' =>	"The San Antonio Business Journal would like to invite you to the annual C-Suite Awards Luncheon. Join us in the celebration as we honor this year's C-Level individuals of the Year Honorees of 2016.", 'from_date' =>	'2016-09-22', 'to_date' => '2016-09-22', 'invite_only' => False, 'rsvp_required' => True, 'url' => 'http://www.bizjournals.com/sanantonio/event/132412/2016/csuite', 'img' => 'csuite.jpeg'],
				['company_id' => 1, 'industry_id' => '14', 'title' =>	'List Makers: An After Hours Even', 'desc' =>	"Join SABJ at Top Golf for an evening of networking and golf and meet the executives of San Antonio's top companies included in the San Antonio Business Journal's 2016 lists.", 'from_date' =>	'2016-09-28', 'to_date' => '2016-09-28', 'invite_only' => False, 'rsvp_required' => True, 'url' => 'hhttp://www.bizjournals.com/sanantonio/event/142902/2016/list-makers-an-after-hours-event', 'img' => 'listmakers.jpeg'],
				['company_id' => 5, 'industry_id' => '28', 'title' =>	'Health Care Heroes', 'desc' =>	"The San Antonio Business Journal recognizes those who have made an impact on health care in our community through their concern for patients, their research and inventions, their management skills, their innovative programs for employees and their services.", 'from_date' =>	'2016-10-12', 'to_date' => '2016-10-12', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'http://www.bizjournals.com/sanantonio/event/132212/2016/health-care-heroes', 'img' => 'healthcare.jpeg'],
				['company_id' => 5, 'industry_id' => '28', 'title' =>	'Shake It Up Fitness: BODY BOOT CAMP!', 'desc' =>	"At the West Side Girl Scout Leadership Center, fitness is fun with the Shake It Up Series! Body Boot Camp classes are full of high energy, body toning moves designed for you to push your limits. These classes are FREE and open to all in the community! Also, check out Shake It Up: Wildcard, and Shake It Up: Zumba!", 'from_date' =>	'2016-10-18', 'to_date' => '2016-10-18', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'https://www.eventbrite.com/e/shake-it-up-fitness-body-boot-camp-tickets-27131635452?aff=es2', 'img' => 'fitness.jpeg'],
				['company_id' => 5, 'industry_id' => '28', 'title' =>	'Alamo City Aztecs, Open Run Tryouts', 'desc' =>	"The Alamo City Aztecs of the North American Basketball League (NABL), are hosting an open-run tryout on Saturday, October 15, 2016. Come tryout, while playing pick-up style games in front of the Aztec coaching staff and front office. All games will be officiated and played for 15-minutes or the first team to score 15-points. Teams will be selected in order of those who pre-register followed by those who register, the day of the Open-Run Tryout. $35 to register at the door and $25 to pre-register, here, online", 'from_date' =>	'2016-10-15', 'to_date' => '2016-10-15', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'https://www.eventbrite.com/e/alamo-city-aztecs-open-run-tryout-tickets-27303797393?aff=es2', 'img' => 'aztecs.jpeg']
			];

			foreach ($events as $event) {
					$new_event = new App\Event();
					$new_event->company_id = $event['company_id'];
					$new_event->title = $event['title'];
					$new_event->industry_id = $event['industry_id'];
					$new_event->desc = $event['desc'];
					$new_event->from_date = $event['from_date'];
					$new_event->to_date = $event['to_date'];
					$new_event->invite_only = $event['invite_only'];
					$new_event->rsvp_required = $event['rsvp_required'];
					$new_event->url = $event['url'];
					$new_event->img = $event['img'];

					$new_event->save();
			}
		}
}
