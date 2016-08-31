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
        ['company_id' => '1', 'user_id' =>	'1', 'phone_no'	=> '2103638295', 'address_line_1' =>	'6908 Union Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78228', 'country' =>	'United States', 'website' =>	'wordpress.org', 'twitter' => 'jmills0', 'facebook' =>	'jmills0', 'instagram' =>	'jmills0', 'linkedin' =>	'jmills0', 'google_plus' => ''],
        ['company_id' => '2', 'user_id' =>	'2', 'phone_no'	=> '2101098061', 'address_line_1' =>	'6 Mosinee Center', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78200', 'country' =>	'United States', 'website' =>	'unc.edu', 'twitter' => 'lgeorge1', 'facebook' =>	'lgeorge1', 'instagram' =>	'lgeorge1', 'linkedin' =>	'lgeorge1', 'google_plus' => ''],
        ['company_id' => '3', 'user_id' =>	'3', 'phone_no'	=> '2106858040', 'address_line_1' =>	'1090 Mandrake Circle', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78219', 'country' =>	'United States', 'website' =>	'hexun.com	', 'twitter' => 'fisher2', 'facebook' =>	'rfisher2', 'instagram' =>	'rfisher2', 'linkedin' =>	'rfisher2', 'google_plus' => ''],
        ['company_id' => '4', 'user_id' =>	'4', 'phone_no'	=> '2102564739', 'address_line_1' =>	'420 Orin Lane', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78224', 'country' =>	'United States', 'website' =>	'constantcontact.com', 'twitter' => 'jnguyen3', 'facebook' =>	'jnguyen3', 'instagram' =>	'jnguyen3', 'linkedin' =>	'jnguyen3', 'google_plus' => ''],
        ['company_id' => '5', 'user_id' =>	'5', 'phone_no'	=> '2109270319', 'address_line_1' =>	'0391 Hermina Park', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78225', 'country' =>	'United States', 'website' =>	'yahoo.co.jp', 'twitter' => 'aalexander4', 'facebook' =>	'aalexander4', 'instagram' =>	'aalexander4', 'linkedin' =>	'aalexander4', 'google_plus' => ''],
        ['company_id' => '6', 'user_id' =>	'6', 'phone_no'	=> '2106577128', 'address_line_1' =>	'604 Blue Bill Park Parkway', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78214', 'country' =>	'United States', 'website' =>	'usgs.gov', 'twitter' => 'tpowell5', 'facebook' =>	'tpowell5', 'instagram' =>	'tpowell5', 'linkedin' =>	'tpowell5', 'google_plus' => ''],
        ['company_id' => '7', 'user_id' =>	'7', 'phone_no'	=> '2107925290', 'address_line_1' =>	'1374 Elgar Hill', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78201', 'country' =>	'United States', 'website' =>	'nifty.com', 'twitter' => 'cperez6', 'facebook' =>	'cperez6', 'instagram' =>	'cperez6', 'linkedin' =>	'cperez6', 'google_plus' => ''],
        ['company_id' => '8', 'user_id' =>	'8', 'phone_no'	=> '2105741272', 'address_line_1' =>	'938 Kings Plaza', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78211', 'country' =>	'United States', 'website' =>	'hp.com', 'twitter' => 'rellis7', 'facebook' =>	'rellis7', 'instagram' =>	'rellis7', 'linkedin' =>	'rellis7', 'google_plus' => ''],
        ['company_id' => '9', 'user_id' =>	'9', 'phone_no'	=> '2103112298', 'address_line_1' =>	'3 Nelson Hill', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78211', 'country' =>	'United States', 'website' =>	'census.gov', 'twitter' => 'wmedina8', 'facebook' =>	'wmedina8', 'instagram' =>	'wmedina8', 'linkedin' =>	'wmedina8', 'google_plus' => '']
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
