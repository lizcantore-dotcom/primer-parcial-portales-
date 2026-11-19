<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productHasGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products_have_genres')->insert([
            [
                'product_fk' => 1,
                'genre_fk' => 1,
            ],
            [
                'product_fk' => 2,
                'genre_fk' => 1,
            ],
            [
                'product_fk' => 3,
                'genre_fk' => 1,
            ],
            [
                'product_fk' => 4,
                'genre_fk' => 3,
            ],
            [
                'product_fk' => 5,
                'genre_fk' => 1,
            ],
            [
                'product_fk' => 6,
                'genre_fk' => 1,
            ],
            [
                'product_fk' => 7,
                'genre_fk' => 1,
            ],
            [
                'product_fk' => 8,
                'genre_fk' => 4,
            ],
            [
                'product_fk' => 9,
                'genre_fk' => 2,
            ],
            [
                'product_fk' => 10,
                'genre_fk' => 2,
            ],
            
        ]);
    }
}
