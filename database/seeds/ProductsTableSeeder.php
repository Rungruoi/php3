<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $product = [];
    	$faker = Faker\Factory::create();
    	for ($i=0; $i < 10; $i++) { 
    		$item = [
    			"name" => $faker->realText($maxNbChars = 100, $indexSize = 1),
    			"slug" =>$faker->realText($maxNbChars = 190, $indexSize = 3),
    			"description" => $faker->realText($maxNbChars = 500, $indexSize = 3),
    			"feature_image" => "image/" . $faker->image("public/image", $width = 640, $height = 480, 'people', false),
    			
    			"status" => rand(0,1),
          "pro_id"=>rand(1,7)
    		];
    		$product[] = $item;
    	}
    	DB::table('product')->insert($product);
    }
}
