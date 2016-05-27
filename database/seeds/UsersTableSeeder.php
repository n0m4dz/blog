<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Schema::truncate('users');

    	$faker = Faker::create();
    	
    	DB::table('users')->insert([
    		'name' => 'admin',
    		'email' => $faker->email,
    		'password' => bcrypt('pass123')
    		]);
    }
}
