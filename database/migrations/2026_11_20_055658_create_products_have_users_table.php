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
    Schema::create('products_have_users', function (Blueprint $table) {
        $table->foreignId('product_fk')->constrained('products', 'id');
        $table->foreignId('user_fk')->constrained('users', 'id');
        $table->timestamps();
        $table->primary(['product_fk', 'user_fk']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_have_users');
    }
};
