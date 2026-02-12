<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_finder_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 50);
            $table->string('email');
            $table->string('postcode', 20)->nullable();
            $table->string('region', 100);
            $table->string('district', 100);
            $table->string('ward', 100)->nullable();
            $table->string('street', 150)->nullable();
            $table->string('property_category', 50);
            $table->string('property_type', 100);
            $table->unsignedInteger('area_sqm')->nullable();
            $table->unsignedInteger('rooms')->nullable();
            $table->string('compound_type', 50)->nullable();
            $table->string('condition', 50)->default('any');
            $table->unsignedInteger('budget_min')->nullable();
            $table->unsignedInteger('budget_max')->nullable();
            $table->string('payment_terms', 30);
            $table->text('note')->nullable();
            $table->string('status', 30)->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_finder_requests');
    }
};
