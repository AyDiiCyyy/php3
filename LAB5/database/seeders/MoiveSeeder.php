<?php

namespace Database\Seeders;

use App\Models\Moive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<50;$i++){
            Moive::query()->create([
                'title'=> fake()->text(25),
                'poster'=> 'https://upload.wikimedia.org/wikipedia/vi/thumb/2/…_teaser.jpg/330px-Avengers_Endgame_bia_teaser.jpg',
                'intro' => fake()->text(50),
                'release_date' =>fake()->date(),
                'genre_id'=> rand(1,2)
            ]);
        }
    }
}
