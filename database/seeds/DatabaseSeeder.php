<?php

use Illuminate\Database\Seeder;

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
            ['name' => 'නිබන්දන', 'slang' => 'tuite'],
            ['name' => 'ඇගයීම්', 'slang' => 'paper'],
            ['name' => 'සබැඳි', 'slang' => 'link']
        ]);

        // Grades
        DB::table('grades')->insert([
            ['name' => '1','slang' => '1'],
            ['name' => '2','slang' => '2'],
            ['name' => '3','slang' => '3'],
            ['name' => '4','slang' => '4'],
            ['name' => '5','slang' => '5'],
            ['name' => '6','slang' => '6'],
            ['name' => '7','slang' => '7'],
            ['name' => '8','slang' => '8'],
            ['name' => '9','slang' => '9'],
            ['name' => '10','slang' => '10'],
            ['name' => '11','slang' => '11'],
            ['name' => '12','slang' => '12'],
            ['name' => '13','slang' => '13'],
            ['name' => 'A/L','slang' => 'al'],
            ['name' => 'O/L','slang' => 'ol'],
            ['name' => 'ශිෂ්‍යත්ව','slang' => 'scholarship']
        ]);
        
        // Subjects
        DB::table('subjects')->insert([
            ['name' => 'Science','slang' => 'science']
        ]);

        DB::table('co_categories')->insert([
             ['name' => 'A/L'],
             ['name' => 'O/L'],
             ['name' => 'ප්‍රාථමික'],
             ['name' => 'කනිෂ්ඨ'],
         ]);

        DB::table('adm_admin_users')->insert([
            ['name' => 'Admin', 'email' => 'chamal.aw@live.com', 'password' => Hash::make('chamal'), 'otp' => '1']
        ]);

        DB::table('adv_categories')->insert([
            ['name' => 'Home page bottom'],
            ['name' => 'Login page bottom'],
            ['name' => 'Forgot password page bottom'],
            ['name' => 'Password reset page bottom']
        ]);

        DB::table('tuition_classes')->insert([
            ['name' =>'Online', 'code'=> 'O' ]
        ]);

        DB::table('teachers')->insert([
            'name' => 'Exam Demo',
            'slang' => 'examdemo',
            'active' => 1,
            'rank' => 1
        ]);
    }
}