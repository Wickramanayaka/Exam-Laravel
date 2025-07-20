<?php

namespace ProactiveAnts\Seminar;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seminars
        DB::table('sem_seminars')->insert([
            ['name' => 'සිසු තරු උදානය'],
            ['name' => 'සිසු දිවියට දෙගුරු සවිය'],
            ['name' => 'ගුරු ගෙදර'],
            ['name' => 'The Champion'],
        ]);
        // Hosts
        DB::table('sem_locations')->insert([
            ['name' => 'Mahawewa'],
            ['name' => 'Marawila'],
            ['name' => 'Madampe'],
            ['name' => 'Chilaw'],
        ]);
        // Locations
        DB::table('sem_hosts')->insert([
            ['name' => 'Mr. Perera'],
            ['name' => 'Kasun Vithanage'],
            ['name' => 'Peter'],
            ['name' => 'Harry'],
        ]);
    }
}
