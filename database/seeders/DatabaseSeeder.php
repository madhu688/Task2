<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(50)->create();
         $faker= Faker::create();
         foreach(range(1,10)as $index)
         {
                DB::table('users')->insert([
                    'name'=>$faker->name,
                    'email'=>$faker->unique()->safeEmail,
                    'password'=>encrypt('password'),
                    'lname'=>$faker->lastName,
                    'phone'=>$faker->phoneNumber,
                    'created_at'=>$faker->dateTimeBetween('-6 month','+1 month'),

                ]);
         }
           $this->call([BlogSeeder::class]);

    }
}
