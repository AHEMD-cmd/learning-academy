<?php

use Illuminate\Database\Seeder;
use App\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=3 ;$i++){
            for($j=1; $j<=5; $j++){
                Course::create([
                    'name' => "course num $i $j",
                    'cat_id' => $i,
                    'trainer_id' => $j,
                    'small_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem',
                    'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining ',
                    'price' => rand(100, 500),
                    'img' =>"$i$j.png",


                ]);
            }
        }
    }
}
