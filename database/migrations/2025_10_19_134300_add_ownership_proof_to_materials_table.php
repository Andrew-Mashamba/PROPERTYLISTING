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
        Schema::table('materials', function (Blueprint $table) {
            $table->string('owner_nida')->nullable()->after('supplier_name');
            $table->string('business_license_document')->nullable()->after('owner_nida');
            $table->string('supplier_certificate')->nullable()->after('business_license_document');
            $table->string('owner_phone')->nullable()->after('supplier_certificate');
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
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn([
                'owner_nida',
                'business_license_document',
                'supplier_certificate',
                'owner_phone',
                'owner_email',
                'verification_status',
                'verification_notes'
            ]);
        });
    }
};
