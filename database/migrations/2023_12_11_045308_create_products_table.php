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
        Schema::create('e_products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->unique();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image', 191)->nullable();
            $table->foreignId('categories_id')->constrained('e_categories');
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
