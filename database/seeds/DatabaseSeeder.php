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
        DB::table('leaders')->delete();
        DB::table('rfps')->delete();
        DB::table('events')->delete();
        DB::table('contacts')->delete();
        DB::table('connections')->delete();
        DB::table('companies')->delete();
        DB::table('carousels')->delete();
        DB::table('industries')->delete();
        DB::table('users')->delete();
        $this->call(IndustriesTableSeeder::class);
        Model::reguard();
    }
}
