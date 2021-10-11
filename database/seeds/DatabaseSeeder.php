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
        // $this->call(UsersTableSeeder::class);
        // $this->call(TrainerSeeder::class);
        factory(\App\Student::class, 10)->create();
        $this->call(CourseStudentSeeder::class);
    }
}
