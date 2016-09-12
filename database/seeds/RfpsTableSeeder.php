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
        ['company_id' => '2', 'project_title' =>	'T-shirt printing for corporate retreat', 'deadline' =>	'2016-10-21', 'industry_id' => 45, 'contact_name' =>	'Mark Baker', 'contact_department' => 'Human Resources', 'contact_no' => '2107849987', 'project_scope' => "Need 50 to 75 t-shirts (multiple sizes) printed with company's logo for our annual corporate retreat.", 'contract_from_date' => '2016-10-01', 'contract_to_date' => '2016-10-14'],
        ['company_id' => '5', 'project_title' =>	'Parking Lot Repaving', 'deadline' =>	'2016-12-31', 'industry_id' => 45, 'contact_name' =>	'Erik Vandenberg', 'contact_department' => 'Maintenance', 'contact_no' => '2108747629', 'project_scope' => 'Our parking lot needs to be repaved before the end of the year. Approx 1.2 acres in size.', 'contract_from_date' => '2016-10-01', 'contract_to_date' => '2016-12-31'],
        ['company_id' => '3', 'project_title' => 'Microbiological Lab Services Needed' , 'deadline' => '2017-04-15', 'industry_id' => 12, 'contact_name' => 'Carlos Ruiz', 'contact_department' => 'Research and Development', 'contact_no' => '2108739784', 'project_scope' => "Seeking a San Antonio laboratory to verify our new V.A.C. VeraFlo's efficacy to sterilize wounds.", 'contract_from_date' => '2016-11-15', 'contract_to_date' => '2017-02-15'],
        ['company_id' => '3', 'project_title' => 'Chemical Disposal Service Needed' , 'deadline' => '2016-12-01', 'industry_id' => 13, 'contact_name' => 'Sam Edwards', 'contact_department' => 'Chemistry', 'contact_no' => '2102236090', 'project_scope' => 'We are seeking a chemical waste disposal company as our current company will be going out of business at the end of the year.', 'contract_from_date' => '2016-01-01', 'contract_to_date' => '2016-12-31'],
        ['company_id' => '1', 'project_title' => 'Web Design Services Needed' , 'deadline' => '2016-11-01', 'industry_id' => 54, 'contact_name' => 'Brianna Dimas', 'contact_department' => 'Communications', 'contact_no' => '2106855539', 'project_scope' => "As we head into the holiday season and the new year just around the courner, we are looking for web designers and web developers to submit proposals for a revamping of our organization website. There is much to discuss, so if you are interested, please contact our representative for further information! Thank you all and, as usual, we hope to continue the growth of our local businesses.", 'contract_from_date' => '2016-12-16', 'contract_to_date' => '2016-12-31'],
        ['company_id' => '1', 'project_title' => 'Caterers: We are looking for you!' , 'deadline' => '2016-12-01', 'industry_id' => 27, 'contact_name' => 'Sammy DeLeon', 'contact_department' => 'Public Relations', 'contact_no' => '2104659988', 'project_scope' => 'Our annual Gala is coming up very soon in the next year. We are looking for caterers who can provide that special flare to their food. We hope to find a local catering company that delivers authentic Mexican cousine for an estimated audience of 1000 business owners and contractors.', 'contract_from_date' => '2017-02-01', 'contract_to_date' => '2017-01-03'],
        ['company_id' => '1', 'project_title' => 'Artists!' , 'deadline' => '2016-12-01', 'industry_id' => 26, 'contact_name' => 'Sammy DeLeon', 'contact_department' => 'Public Relations', 'contact_no' => '2104659988', 'project_scope' => 'Looking for local talent to paint a portrait of our outgoing CEO. The painting will be revealed at the upcoming Gala.', 'contract_from_date' => '2016-12-15', 'contract_to_date' => '2017-1-20'],
        ['company_id' => '5', 'project_title' => 'Youth Court Refinished' , 'deadline' => '2016-11-01', 'industry_id' => 26, 'contact_name' => 'Erik Vandenberg', 'contact_department' => 'Maintenance', 'contact_no' => '2108747629', 'project_scope' => 'Our organization sponsors a space for inner-city youth to play basketball in the afternoons and evenings at the downtown youth center. The court is in need of refinishing as years of wear have left us in desperate need of a new clear coat. Asking for bids on a budget.', 'contract_from_date' => '2016-12-01', 'contract_to_date' => '2016-12-31'],
        ['company_id' => '5', 'project_title' => 'New Olympic Swimming Pool Needed' , 'deadline' => '2016-09-17', 'industry_id' => 26, 'contact_name' => 'Erik Vandenberg', 'contact_department' => 'Maintenance', 'contact_no' => '2108747629', 'project_scope' => 'The city has just approved the installation of an Olympic-sized swimming pool to be added to the Carl C. Young facility on the west side of town. Local Athlead athletes require the pool to be completed no later than January 1. This is a very quick turnaround job and will pay accordingly.', 'contract_from_date' => '2016-10-01', 'contract_to_date' => '2016-12-31']
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
