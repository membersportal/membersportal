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
      factory(App\Rfp::class, 100)->create();
    }
}
