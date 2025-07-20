<?php

namespace ProactiveAnts\Library;

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
        DB::table('lib_categories')->insert([
            ['name' => 'ගුරු මාර්ගෝපදේශ සංග්‍රහය', 'slang' => 'teacher-guides'],
            ['name' => 'පෙළපොත්', 'slang' => 'text-books'],
            ['name' => 'ඡායාරූප', 'slang' => 'photos'],
            ['name' => 'ගීත', 'slang' => 'songs'],
        ]);
    }
}
