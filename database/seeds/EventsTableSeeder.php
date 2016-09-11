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
      // ,
      // ['company_id' => 2, 'title' =>	'Spiceworld 2016', 'desc' => 'Come be a part of the most happening, Texas-sized IT conference around...right smack in the heart of the Lone Star State! For our 9th year in a row, we are bringing together thousands of IT pros and tech marketers for 3 jam-packed days of how-to sessions, networking, happy hours, parties, and FUN.', 'from_date' =>	'11-01-2016', 'to_date' => '11-03-2016', 'invite_only' => False, 'rsvp_required' => True, 'url' => 'https://www.spiceworks.com/spiceworld/austin', 'img' => 'spiceworld.jpg']

      $events = [
        ['company_id' => 6, 'industry_id' => '32', 'title' =>	'Transpo 2016', 'desc' =>	'Exposition for integrating from bicycles to connected vehicles', 'from_date' =>	'2016-11-13', 'to_date' => '2016-11-16', 'invite_only' => False, 'rsvp_required' => False, 'url' => "http://www.codeup.com", 'img' => 'transpo.jpg'],
        ['company_id' => 3, 'industry_id' => '28', 'title' =>	'The American Society for Nondestructive Testing', 'desc' =>	"Trade show in Long Beach, California", 'from_date' =>	'2016-10-23', 'to_date' => '2016-10-27', 'invite_only' => False, 'rsvp_required' => False, 'url' => "http://www.codeup.com", 'img' => 'testing.jpg'],
        ['company_id' => 3, 'industry_id' => '28', 'title' =>	'V.A.C. Veraflow Training', 'desc' =>	"Training for our new V.A.C. Veraflow machine will be held on 11-06-2016 in the R&D lab.", 'from_date' =>	'2016-11-06', 'to_date' => '2016-11-11', 'invite_only' => True, 'rsvp_required' => False, 'url' => 'https://www.kci-medical.com/veraflowtraining', 'img' => 'medical.jpg'],
        ['company_id' => 2, 'industry_id' => '47', 'title' =>	'Open House', 'desc' =>	'We want to get to know you! Meet (and greet) our instructors as they lead you on a free tour of our classrooms. Refreshments will be served afterwards. Open to the public.', 'from_date' =>	'2016-11-11', 'to_date' => '2016-11-11', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'http://www.codeup.com', 'img' => 'open_house.png'],
        ['company_id' => 2, 'industry_id' => '47', 'title' =>	'Openstack Summit Barcelona', 'desc' =>	"The OpenStack Summit is the most important gathering of IT leaders, telco operators, cloud administrators, app developers and OpenStack contributors building the future of cloud computing. Hear business cases and operational experience directly from users, learn about new products in the ecosystem and participate in hands-on workshops to build your skills.", 'from_date' =>	'2016-10-24', 'to_date' => '2016-10-28', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'https://www.openstack.org/summit/barcelona-2016/', 'img' => 'summit.jpg'],
        ['company_id' => 5, 'industry_id' => '28', 'title' =>	'Halloween Fun-Run', 'desc' =>	"5K charitable run for Leukemia/Lymphoma Association. Get active!", 'from_date' =>	'2016-10-31', 'to_date' => '2016-10-31', 'invite_only' => False, 'rsvp_required' => False, 'url' => 'http://www.codeup.com', 'img' => 'run.jpg']
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
