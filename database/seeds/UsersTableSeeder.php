<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
       $users = [
            [
                "name" => "Dungvn",
                "email" => "dungvn@gmail.com",
                "password" => Hash::make('123456'),
                "address" => $faker->realText($maxNbChars = 500, $indexSize = 3),
                "role"=>"1",
                "numberphone"=>"0393079176"
            ],
            [
                "name" => "tien",
                "email" => "thuongdan@gmail.com",
                "password" => Hash::make('123456'),
                "address" => $faker->realText($maxNbChars = 500, $indexSize = 3),
                "role"=>"1",
                "numberphone"=>"0393079176"
            ]


        ];
        DB::table('users')->insert($users);
    }
}
