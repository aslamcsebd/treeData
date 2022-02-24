<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AllSeeder extends Seeder{
   public function run(){
   $faker = Faker::create();

      foreach (range(1, 5) as $value) {
         DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'remember_token' => '123321',
         ]);
      }

      foreach (range(1, 10) as $value) {
         DB::table('tree_titles')->insert([
            'user_id' => $faker->numberBetween(1, 5),
            'title_name' => $faker->name,      
         ]);
      }

      foreach (range(1, 10) as $value) {
         DB::table('tree_datas')->insert([
            'user_id' => $faker->numberBetween(1, 5),
            'parent_id' => $faker->numberBetween(1, 10),            
            'data_name' => $faker->name,          
         ]);
      }
   }
}
