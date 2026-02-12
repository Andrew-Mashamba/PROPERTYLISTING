<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_finder_requests', function (Blueprint $table) {
            $table->unsignedInteger('area_sqm')->nullable()->after('property_type');
        });
    }

    public function down(): void
    {
        Schema::table('home_finder_requests', function (Blueprint $table) {
            $table->dropColumn('area_sqm');
        });
    }
};
