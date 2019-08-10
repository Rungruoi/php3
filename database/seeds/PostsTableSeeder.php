<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $posts = [];
    	$faker = Faker\Factory::create();
    	for ($i=0; $i < 10; $i++) { 
    		$item = [
    			"title" => $faker->realText($maxNbChars = 100, $indexSize = 1),
    			"image" => "image/" . $faker->image("public/image", $width = 640, $height = 480, 'people', false),
    			"content" => $faker->realText($maxNbChars = 190, $indexSize = 3),
    			"publish_date" => $faker->
    			dateTimeThisCentury($max = 'now', $timezone = null),
    			"auther" => $faker->name,
    			"status" => rand(0,1),
                "cate_id"=>rand(1,7)
    		];
    		$posts[] = $item;
    	}
    	DB::table('posts')->insert($posts);
    }
}
