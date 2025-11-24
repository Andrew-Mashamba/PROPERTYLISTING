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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('property_type', ['residential', 'commercial', 'land', 'industrial']);
            $table->enum('listing_type', ['sale', 'rent', 'both']);
            $table->decimal('price', 15, 2);
            $table->enum('price_type', ['fixed', 'negotiable', 'auction'])->default('fixed');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('area_sqft', 10, 2)->nullable();
            $table->text('address');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('zip_code', 20);
            $table->string('country', 100)->default('USA');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('status', ['active', 'pending', 'sold', 'rented', 'inactive'])->default('active');
            $table->boolean('featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['user_id', 'status']);
            $table->index(['property_type', 'listing_type']);
            $table->index(['city', 'state']);
            $table->index(['price', 'status']);
            $table->index('featured');
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
