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
        // 1	1	62-(997)363-8295	6908 Union Street			San Antonio	TX
        // 2	2	269-(644)109-8061	6 Mosinee Center			San Antonio	TX
        // 3	3	7-(673)685-8040	1090 Mandrake Circle			San Antonio	TX
        // 4	4	48-(469)256-4739	420 Orin Lane			San Antonio	TX
        // 5	5	972-(374)927-0319	0391 Hermina Park			San Antonio	TX
        // 6	6	57-(373)657-7128	604 Blue Bill Park Parkway			San Antonio	TX
        // 7	7	232-(746)792-5290	1374 Elgar Hill			San Antonio	TX
        // 8	8	84-(438)574-1272	938 Kings Plaza			San Antonio	TX
        // 9	9	57-(450)311-2298	3 Nelson Hill			San Antonio	TX
      ];

      foreach ($contacts as $contact) {
          $new_contact = new App\Contact();
          $new_contact->user_id = $contact['user_id'];
          $new_contact->name = $contact['name'];
          $new_contact->industry_id = $contact['industry_id'];
          $new_contact->profile_img = $contact['profile_img'];
          $new_contact->header_img = $contact['header_img'];
          $new_contact->desc = $contact['desc'];
          $new_contact->size = $contact['size'];
          $new_contact->woman_owned = $contact['woman_owned'];
          $new_contact->contractor = $contact['contractor'];
          $new_contact->family_owned = $contact['family_owned'];
          $new_contact->organization = $contact['organization'];
          $new_contact->date_established = $contact['date_established'];
          $new_contact->save();
        }
    }
}
