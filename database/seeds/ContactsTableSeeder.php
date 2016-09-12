<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $contacts = [
        ['company_id' => '1', 'user_id' =>  '1', 'phone_no' => '2103638295', 'address_line_1' =>  '600 Navarro St #350', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78205', 'country' => 'United States', 'website' => 'https://www.codeup.com', 'twitter' => 'jmills_business', 'facebook' => 'https://www.facebook.com/GoCodeup/', 'instagram' =>  'https://www.instagram.com/gocodeup/', 'linkedin' =>  'https://www.linkedin.com/company/codeup', 'google_plus' => 'https://plus.google.com/+Codeup'],
        ['company_id' => '2', 'user_id' =>  '2', 'phone_no' => '2103638295', 'address_line_1' =>  '600 Navarro', 'address_line_2' => 'Ste. 350', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78205', 'country' => 'United States', 'website' => 'https://www.codeup.com', 'twitter' => 'gocodeup', 'facebook' => 'https://www.facebook.com/GoCodeup/', 'instagram' =>  'https://www.instagram.com/gocodeup/', 'linkedin' =>  'https://www.linkedin.com/in/randimays', 'google_plus' => 'https://plus.google.com/+Codeup'],
        ['company_id' => '3', 'user_id' =>  '3', 'phone_no' => '2103638295', 'address_line_1' =>  '600 Navarro', 'address_line_2' => 'Ste. 350', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78205', 'country' => 'United States', 'website' => 'https://www.codeup.com', 'twitter' => 'medicalnews', 'facebook' => 'https://www.facebook.com/GoCodeup/', 'instagram' =>  'https://www.instagram.com/gocodeup/', 'linkedin' =>  'https://www.linkedin.com/in/anthony-martinez', 'google_plus' => 'https://plus.google.com/+Codeup'],
        ['company_id' => '4', 'user_id' =>  '4', 'phone_no' => '2103638295', 'address_line_1' =>  '600 Navarro', 'address_line_2' => 'Ste. 350', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78205', 'country' => 'United States', 'website' => 'https://www.codeup.com', 'twitter' => 'kippsatx', 'facebook' => 'https://www.facebook.com/GoCodeup/', 'instagram' =>  'https://www.instagram.com/gocodeup/', 'linkedin' =>  'https://www.linkedin.com/in/randimays', 'google_plus' => 'https://plus.google.com/+Codeup'],
        ['company_id' => '5', 'user_id' =>  '5', 'phone_no' => '8005137678', 'address_line_1' =>  '100 West Houston Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78205', 'country' => 'United States', 'website' => 'https://www.codeup.com', 'twitter' => 'fitbit', 'facebook' =>  'https://www.facebook.com/GoCodeup', 'instagram' =>  'https://www.instagram.com/gocodeup/', 'linkedin' => 'https://www.linkedin.com/in/anthony-martinez', 'google_plus' => 'https://plus.google.com/+Codeup'],
        ['company_id' => '6', 'user_id' =>  '6', 'phone_no' => '2102270044', 'address_line_1' =>  '915 Dallas Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78215', 'country' => 'United States', 'website' => 'https://www.codeup.com', 'twitter' => 'breakingnews', 'facebook' =>  'https://www.facebook.com/GoCodeup', 'instagram' =>  'https://www.instagram.com/gocodeup/', 'linkedin' => 'https://www.linkedin.com/in/jaynichols', 'google_plus' => 'https://plus.google.com/+Codeup']
      ];

      foreach ($contacts as $contact) {
          $new_contact = new App\Contact();
          $new_contact->company_id = $contact['company_id'];
          $new_contact->user_id = $contact['user_id'];
          $new_contact->phone_no = $contact['phone_no'];
          $new_contact->address_line_1 = $contact['address_line_1'];
          $new_contact->address_line_2 = $contact['address_line_2'];
          $new_contact->address_line_3 = $contact['address_line_3'];
          $new_contact->city = $contact['city'];
          $new_contact->state = $contact['state'];
          $new_contact->zip = $contact['zip'];
          $new_contact->country = $contact['country'];
          $new_contact->website = $contact['website'];
          $new_contact->twitter = $contact['twitter'];
          $new_contact->facebook = $contact['facebook'];
          $new_contact->instagram = $contact['instagram'];
          $new_contact->linkedin = $contact['linkedin'];
          $new_contact->google_plus = $contact['google_plus'];
          $new_contact->save();
        }
    }
}
