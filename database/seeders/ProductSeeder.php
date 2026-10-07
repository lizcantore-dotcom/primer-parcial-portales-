<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Placa de Video RTX 4060',
                'price' => 450000.00,
                'stock' => 10,
                'release_date' => '2026-01-15',
                'description' => 'Placa gráfica de última generación ideal para gaming en 1080p y diseño 3D.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Procesador Intel Core i5 13400F',
                'price' => 280000.00,
                'stock' => 15,
                'release_date' => '2026-02-10',
                'description' => 'Procesador de 10 núcleos para rendimiento óptimo en multitarea y juegos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Memoria RAM 16GB DDR5 Kingston Fury',
                'price' => 95000.00,
                'stock' => 25,
                'release_date' => '2026-01-20',
                'description' => 'Módulo de memoria de alta velocidad diseñado para plataformas modernas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Disco Sólido SSD 1TB NVMe M.2 WD',
                'price' => 110000.00,
                'stock' => 30,
                'release_date' => '2026-01-05',
                'description' => 'Almacenamiento ultrarrápido para cargas de sistema y juegos instantáneas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Motherboard ASUS Prime B760M-A',
                'price' => 210000.00,
                'stock' => 8,
                'release_date' => '2026-02-01',
                'description' => 'Placa madre con soporte para procesadores Intel de 12ma, 13ra y 14ta gen.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fuente de Alimentación 750W 80 Plus Gold',
                'price' => 160000.00,
                'stock' => 12,
                'release_date' => '2026-01-12',
                'description' => 'Fuente modular con certificación de eficiencia energética y alta seguridad.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gabinete Gamer Mid Tower Vidrio Templado',
                'price' => 90000.00,
                'stock' => 20,
                'release_date' => '2026-02-15',
                'description' => 'Gabinete con excelente flujo de aire y panel lateral de vidrio templado.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Monitor 24" IPS 165Hz Full HD',
                'price' => 290000.00,
                'stock' => 7,
                'release_date' => '2026-01-25',
                'description' => 'Monitor gaming con tasa de refresco alta y tiempo de respuesta de 1ms.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teclado Mecánico Gamer RGB Switch Red',
                'price' => 65000.00,
                'stock' => 18,
                'release_date' => '2026-02-05',
                'description' => 'Teclado compacto con iluminación personalizable y switches mecánicos silenciosos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mouse Inalámbrico Ergonómico',
                'price' => 35000.00,
                'stock' => 40,
                'release_date' => '2026-01-10',
                'description' => 'Mouse óptico de alta precisión con conexión inalámbrica de baja latencia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
