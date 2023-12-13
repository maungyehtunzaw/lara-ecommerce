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
        Schema::create('e_orders', function (Blueprint $table) {
            $table->id();
            $table->string('saleno', 191)->unique();
            $table->foreignId('products_id')->constrained('e_products');
            $table->foreignId('customers_id')->constrained('e_customers');
            $table->integer('qty');
            $table->decimal('unit_rate', 8, 2);
            $table->integer( 'paid_status');
            $table->decimal('total_amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
