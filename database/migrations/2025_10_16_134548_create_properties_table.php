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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 12, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('sqft');
            $table->text('address');
            $table->string('image_url');
            $table->enum('tag', ['New Listing', 'Price Reduced', 'Featured', 'Great Value']);
            $table->enum('status', ['Active', 'Pending', 'Sold', 'Rented']);
            $table->string('agent_name');
            $table->string('mls_id')->unique();
            $table->string('property_type')->default('Residential');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
