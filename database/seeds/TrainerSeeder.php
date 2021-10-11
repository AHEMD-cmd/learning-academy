<?php

use Illuminate\Database\Seeder;
use App\Trainer;
class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name' => 'ali',
            'img' => '1.png',
            'spec' => 'web'
        ]);
        Trainer::create([
            'name' => 'amr',
            'img' => '2.png',
            'spec' => 'design'
        ]);
        Trainer::create([
            'name' => 'ahmed',
            'img' => '3.png',
            'spec' => 'english'
        ]);
        Trainer::create([
            'name' => 'hasan',
            'img' => '4.png',
            'spec' => 'arabic'
        ]);
        Trainer::create([
            'name' => 'nader',
            'img' => '5.png',
            'spec' => 'it'
        ]);
    }
}
