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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('owner_nida')->nullable()->after('user_id');
            $table->string('title_deed_document')->nullable()->after('owner_nida');
            $table->string('sales_agreement_document')->nullable()->after('title_deed_document');
            $table->string('owner_phone')->nullable()->after('sales_agreement_document');
            $table->string('owner_email')->nullable()->after('owner_phone');
            $table->string('verification_status')->default('pending')->after('owner_email');
            $table->text('verification_notes')->nullable()->after('verification_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'owner_nida',
                'title_deed_document',
                'sales_agreement_document',
                'owner_phone',
                'owner_email',
                'verification_status',
                'verification_notes'
            ]);
        });
    }
};
