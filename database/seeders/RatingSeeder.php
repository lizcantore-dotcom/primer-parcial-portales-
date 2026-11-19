<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ratings')->insert([
            [
                'rating_id' => 1,
                'name' => 'Gama de Entrada',
                'abbreviation' => 'ENT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating_id' => 2,
                'name' => 'Gama Media',
                'abbreviation' => 'MED',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rating_id' => 3,
                'name' => 'Gama Alta',
                'abbreviation' => 'ALT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
