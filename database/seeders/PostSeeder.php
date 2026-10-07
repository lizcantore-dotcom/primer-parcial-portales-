<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Llegan los nuevos componentes a la tienda',
                'author' => 'Administrador',
                'published_at' => '2026-10-01',
                'content' => 'Ya se encuentra disponible la nueva línea de hardware enfocado en alto rendimiento para este cuatrimestre.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cómo elegir la mejor placa de video para tu PC',
                'author' => 'Soporte Técnico',
                'published_at' => '2026-10-02',
                'content' => 'Analizamos los puntos clave que debes tener en cuenta según la resolución de tu monitor y tus juegos favoritos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Todo lo que debes saber sobre memorias DDR5',
                'author' => 'Redacción',
                'published_at' => '2026-10-03',
                'content' => 'Descubre las principales diferencias de velocidad y eficiencia energética frente a la generación anterior.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mantenimiento preventivo para tu computadora',
                'author' => 'Administrador',
                'published_at' => '2026-10-04',
                'content' => 'Consejos prácticos para limpiar el polvo y cambiar la pasta térmica de tus componentes principales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Diferencias entre discos SSD SATA y NVMe M.2',
                'author' => 'Soporte Técnico',
                'published_at' => '2026-10-05',
                'content' => 'Una guía rápida para entender por qué la velocidad de transferencia cambia drásticamente entre ambos formatos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Guía de fuentes de poder: ¿Cuántos watts necesitas?',
                'author' => 'Administrador',
                'published_at' => '2026-10-06',
                'content' => 'Calcula de forma segura la energía requerida para evitar cortes y proteger tus componentes de gama alta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Los mejores procesadores calidad-precio del año',
                'author' => 'Redacción',
                'published_at' => '2026-10-06',
                'content' => 'Hacemos un repaso por los modelos que ofrecen el mejor balance entre potencia multitarea y costo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Importancia de una buena refrigeración líquida',
                'author' => 'Soporte Técnico',
                'published_at' => '2026-10-06',
                'content' => 'Cuándo vale la pena dar el salto desde un cooler de aire tradicional hacia un sistema de refrigeración líquida.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Periféricos gamer: Teclados mecánicos y switches',
                'author' => 'Redacción',
                'published_at' => '2026-10-06',
                'content' => 'Explicamos las características de los switches red, blue y brown para que elijas el tacto ideal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lanzamiento oficial de nuestra sección de soporte',
                'author' => 'Administrador',
                'published_at' => '2026-10-06',
                'content' => 'Anunciamos la apertura de canales directos de asesoramiento para armado de equipos personalizados.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
