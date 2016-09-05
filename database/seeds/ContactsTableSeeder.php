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
        ['company_id' => '1', 'user_id' =>  '1', 'phone_no' => '2103638295', 'address_line_1' =>  '6908 Union Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78228', 'country' => 'United States', 'website' => 'wordpress.org', 'twitter' => 'jmills_business', 'facebook' =>  'jmills0', 'instagram' => 'jmills0', 'linkedin' =>  'jmills0', 'google_plus' => ''],
['company_id' => '2', 'user_id' =>  '2', 'phone_no' => '2103435316', 'address_line_1' =>  '4040 Broadway', 'address_line_2' => 'Ste 350', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78209', 'country' =>  'United States', 'website' => 'https://www.dustinwhittenburglaw.com', 'twitter' => 'DSWhittenburg', 'facebook' => 'https://www.facebook.com/The-Law-Office-of-Dustin-Whittenburg-242967916650/', 'instagram' => '', 'linkedin' => 'https://www.linkedin.com/company/law-office-of-dustin-whittenburg', 'google_plus' => 'https://plus.google.com/116078758726203799192'],
['company_id' => '3', 'user_id' =>  '3', 'phone_no' => '2103424242', 'address_line_1' =>  '8207 Callaghan Road', 'address_line_2' => 'Ste. 400', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78230', 'country' => 'United States', 'website' => 'https://www.4mrealty.com', 'twitter' => '', 'facebook' =>  '', 'instagram' =>  '', 'linkedin' => '', 'google_plus' => ''],
['company_id' => '4', 'user_id' =>  '4', 'phone_no' => '2108763204', 'address_line_1' =>  '506 Mesa Walk', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78258', 'country' => 'United States', 'website' => 'https://www.mancharoofing.com', 'twitter' => '', 'facebook' => '', 'instagram' =>  '', 'linkedin' => '', 'google_plus' => 'https://plus.google.com/114747085846420298797'],
['company_id' => '5', 'user_id' =>  '5', 'phone_no' => '8005137678', 'address_line_1' =>  '100 West Houston Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78205', 'country' => 'United States', 'website' => 'https://www.frostbank.com', 'twitter' => 'FrostBank', 'facebook' =>  'https://www.facebook.com/FrostBank', 'instagram' =>  'https://www.instagram.com/frostbank/', 'linkedin' => 'https://www.linkedin.com/company/frost-bank', 'google_plus' => ''],
['company_id' => '6', 'user_id' =>  '6', 'phone_no' => '2102270044', 'address_line_1' =>  '915 Dallas Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78215', 'country' => 'United States', 'website' => 'https://www.sacurrent.com', 'twitter' => 'SAcurrent', 'facebook' =>  'https://www.facebook.com/sacurrent', 'instagram' =>  'https://www.instagram.com/sacurrent/', 'linkedin' => 'https://www.linkedin.com/company/san-antonio-current', 'google_plus' => 'https://plus.google.com/101321049475770462853'],
['company_id' => '7', 'user_id' =>  '7', 'phone_no' => '2103452000', 'address_line_1' =>  '1 Valero Way', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78249', 'country' =>  'United States', 'website' => 'https://www.valero.com', 'twitter' => 'ValeroEnergy_', 'facebook' => 'https://www.facebook.com/valeroenergy', 'instagram' => '', 'linkedin' => 'https://www.linkedin.com/company/valero-energy-corporation', 'google_plus' => ''],
['company_id' => '8', 'user_id' =>  '8', 'phone_no' => '2103491163', 'address_line_1' =>  '1017 N. Main Street', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78212', 'country' => 'United States', 'website' => 'https://www.munozandcompany.com', 'twitter' => 'MunozandCo', 'facebook' => 'https://www.facebook.com/MunozAndCompany/', 'instagram' => '', 'linkedin' => 'https://www.linkedin.com/company/kell-munoz-architects', 'google_plus' => ''],
['company_id' => '9', 'user_id' =>  '9', 'phone_no' => '2103112298', 'address_line_1' =>  '3 Nelson Hill', 'address_line_2' => '', 'address_line_3' => '', 'city' => 'San Antonio', 'state' => 'TX', 'zip' => '78211', 'country' => 'United States', 'website' => 'census.gov', 'twitter' => 'wmedina8', 'facebook' =>  'wmedina8', 'instagram' =>  'wmedina8', 'linkedin' => 'wmedina8', 'google_plus' => ''],
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
