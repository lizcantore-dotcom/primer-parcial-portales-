<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class postHasGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts_have_genres')->insert([
            [
                'post_fk' => 1,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 2,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 3,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 4,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 5,
                'genre_fk' => 3,
            ],
            [
                'post_fk' => 6,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 7,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 8,
                'genre_fk' => 1,
            ],
            [
                'post_fk' => 9,
                'genre_fk' => 2,
            ],
            [
                'post_fk' => 10,
                'genre_fk' => 1,
            ],
            
        ]);
    }
}
