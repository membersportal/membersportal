<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('carousels')->delete();
        $this->call(CarouselsTableSeeder::class);
        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
