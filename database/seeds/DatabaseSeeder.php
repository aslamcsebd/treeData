<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
   public function run(){
      
      $this->call([
         AllSeeder::class,
         /*UserSeeder::class,
         AdminSeeder::class,
         ClintSeeder::class,*/
      ]);
   }
}
