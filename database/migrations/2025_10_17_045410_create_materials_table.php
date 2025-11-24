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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('sku')->unique();
            $table->string('category');
            $table->string('brand');
            $table->string('image_url');
            $table->integer('stock_quantity')->default(0);
            $table->string('unit')->default('piece'); // piece, kg, meter, etc.
            $table->json('specifications')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_available')->default(true);
            $table->decimal('discount_percentage', 5, 2)->default(0);
            $table->string('supplier_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
