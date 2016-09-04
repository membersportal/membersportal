<?php

use Illuminate\Database\Seeder;

class LeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Leader::class, 30)->create();
    }
}
