<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // Equivalente a movie_id PRIMARY BIGINT UNSIGNED NOT NULL AUTO_INCREMENT
        $table->string('name', 100);       // Nombre del producto
        $table->unsignedInteger('price');  // Precio
        $table->integer('stock');          // Stock disponible
        $table->date('release_date');      // Fecha de lanzamiento o ingreso
        $table->text('description');       // Descripción o sinopsis del producto
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
