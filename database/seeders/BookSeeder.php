<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0; $i< 100; $i++){
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
    }
}
