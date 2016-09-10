<?php

use Illuminate\Database\Seeder;

class RfpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rfps = [
        ['company_id' => '2', 'project_title' =>	'T-shirt printing for corporate retreat', 'deadline' =>	'2016-10-21', 'industry_id' => 45, 'contact_name' =>	'Mark Baker', 'contact_department' => 'Human Resources', 'contact_no' => '2107849987', 'project_scope' => 'Need 50 to 75 t-shirts (multiple sizes) printed with company\'s logo for our annual corporate retreat.', 'contract_from_date' => '2016-10-01', 'contract_to_date' => '2016-10-14'],
        ['company_id' => '5', 'project_title' =>	'Parking Lot Repaving', 'deadline' =>	'2016-12-31', 'industry_id' => 45, 'contact_name' =>	'Erik Vandenberg', 'contact_department' => 'Maintenance', 'contact_no' => '2108747629', 'project_scope' => 'Our parking lot needs to be repaved before the end of the year. Approx 1.2 acres in size.', 'contract_from_date' => '2016-10-01', 'contract_to_date' => '2016-12-31'],
        ['company_id' => '3', 'project_title' => 'Microbiological Lab Services Needed' , 'deadline' => '2017-04-15', 'industry_id' => 12, 'contact_name' => 'Carlos Ruiz', 'contact_department' => 'Research and Development', 'contact_no' => '2108739784', 'project_scope' => 'Seeking a San Antonio laboratory to verify our new V.A.C. VeraFlo\'s efficacy to sterilize wounds.', 'contract_from_date' => '2016-11-15', 'contract_to_date' => '2017-02-15'],
        ['company_id' => '3', 'project_title' => 'Chemical Disposal Service Needed' , 'deadline' => '2016-12-01', 'industry_id' => 13, 'contact_name' => 'Sam Edwards', 'contact_department' => 'Chemistry', 'contact_no' => '2102236090', 'project_scope' => 'We are seeking a chemical waste disposal company as our current company will be going out of business at the end of the year.', 'contract_from_date' => '2016-01-01', 'contract_to_date' => '2016-12-31']
      ];

      foreach ($rfps as $rfp) {
          $new_rfp = new App\Rfp();
          $new_rfp->company_id = $rfp['company_id'];
          $new_rfp->project_title = $rfp['project_title'];
          $new_rfp->deadline = $rfp['deadline'];
          $new_rfp->industry_id = $rfp['industry_id'];
          $new_rfp->contact_name = $rfp['contact_name'];
          $new_rfp->contact_department = $rfp['contact_department'];
          $new_rfp->contact_no = $rfp['contact_no'];
          $new_rfp->project_scope = $rfp['project_scope'];
          $new_rfp->contract_from_date = $rfp['contract_from_date'];
          $new_rfp->contract_to_date = $rfp['contract_to_date'];

          $new_rfp->save();
      }

      // factory(App\Rfp::class, 100)->create();
    }
}
