<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('sqft')->nullable()->change();
            $table->integer('bedrooms')->nullable()->change();
            $table->integer('bathrooms')->nullable()->change();
            $table->string('image_url')->nullable()->change();
            $table->string('tag')->nullable()->change();
            $table->string('agent_name')->nullable()->change();
            $table->string('mls_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('sqft')->nullable(false)->change();
            $table->integer('bedrooms')->nullable(false)->change();
            $table->integer('bathrooms')->nullable(false)->change();
            $table->string('image_url')->nullable(false)->change();
            $table->string('tag')->nullable(false)->change();
            $table->string('agent_name')->nullable(false)->change();
            $table->string('mls_id')->nullable(false)->change();
        });
    }
};
