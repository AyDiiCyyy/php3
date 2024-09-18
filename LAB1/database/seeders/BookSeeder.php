<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i <100;$i++){
            DB::table('books')
            ->insert([
                'title' => $faker->text(20),
                'thumbnail' => 'https://img.lazcdn.com/g/p/1352bf1f0e687f8f3cbe0ed82133ddfb.jpg_720x720q80.jpg_.webp',
                'author' => $faker->text(10),
                'publisher' => $faker->text(10),
                'Publication' => $faker->dateTime(),
                'Price' => $faker->randomFloat(2,100,1000),
                'Quantity'=>rand(1,1000),
                'Category_id'=>rand(1,5),
            ]);
        }
    }
}
