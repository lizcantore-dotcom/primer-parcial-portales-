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
                'rating_id'=>1,
                'name'=>'Apta todo Publico',
                'abbreviation'=>'ATP',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
