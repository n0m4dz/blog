<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	$user = DB::table('users')->select('id')->first();

        for($i = 0; $i < 10; $i++){
        	DB::table('post')->insert([
        		'title' => $faker->name,
        		'content' => $faker->text,
        		'user_id' => $user->id
        		]);
        }
    }
}
