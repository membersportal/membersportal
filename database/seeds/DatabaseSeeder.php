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
        DB::table('users')->delete();
        DB::table('industries')->delete();
        DB::table('carousels')->delete();
        DB::table('articles')->delete();
        $this->call(ArticlesTableSeeder::class);
        $this->call(CarouselsTableSeeder::class);
        $this->call(IndustriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ConnectionsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(RfpsTableSeeder::class);
        // $this->call(LeadersTableSeeder::class);

        // $this->call(UserTableSeeder::class);
        Model::reguard();
    }
}
