<?php

namespace Database\Seeders;

use App\Models\Gene;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gene::query()->create([
            'name' => 'Hành động'
        ]);
        Gene::query()->create([
        
            'name' => 'Võ thuật'
        ]);
    }
}
