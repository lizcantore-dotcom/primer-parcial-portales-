<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'genre_id' => 1,
                'name' => 'Hardware',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 2,
                'name' => 'Periféricos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 3,
                'name' => 'Almacenamiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 4,
                'name' => 'Monitores',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 5,
                'name' => 'Audio y Video',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
