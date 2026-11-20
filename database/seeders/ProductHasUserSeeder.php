<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductHasUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
{
    DB::table('products_have_users')->insert([
        [
            'product_fk' => 1,
            'user_fk' => 2,
        ],
        [
            'product_fk' => 2,
            'user_fk' => 2,
        ],
    ]);
}
}
