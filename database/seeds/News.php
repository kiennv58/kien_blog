<?php

use Illuminate\Database\Seeder;

class News extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 100;
        for ($i=0; $i < $limit; $i++) { 
        	$title = $faker->sentence($nbWords = 7, $variableNbWords = true)
        	DB::table('news')->insert([
        		'title' => $title, 'cut_title' => changTitle($title), 'description' => $faker->text($maxNbChars = 15), 'content' => $faker->text($maxNbChars = 200) 
        	]);
        }
    }
}
