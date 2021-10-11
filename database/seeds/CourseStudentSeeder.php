<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=1; $i=2; $i++){
            DB::table('course_student')->insert([
                'course_id' => 1,
                'student_id' => 1,

                // 'course_id' => rand(1, 15),
                // 'student_id' => rand(1, 10),
                // 'created_at' => now(),
                // 'updated_at' => now(),

            ]);
        // }
    }
}
