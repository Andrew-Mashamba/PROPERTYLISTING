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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nida_document')->nullable()->after('business_type');
            $table->string('passport_document')->nullable()->after('nida_document');
            $table->string('business_license')->nullable()->after('passport_document');
            $table->string('certificate_of_incorporation')->nullable()->after('business_license');
            $table->string('tax_clearance_certificate')->nullable()->after('certificate_of_incorporation');
            $table->string('memorandum_of_association')->nullable()->after('tax_clearance_certificate');
            $table->string('articles_of_association')->nullable()->after('memorandum_of_association');
            $table->string('board_resolution')->nullable()->after('articles_of_association');
            $table->string('proof_of_address')->nullable()->after('board_resolution');
            $table->string('bank_statement')->nullable()->after('proof_of_address');
            $table->string('kyc_status')->default('pending')->after('bank_statement');
            $table->text('kyc_notes')->nullable()->after('kyc_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nida_document',
                'passport_document',
                'business_license',
                'certificate_of_incorporation',
                'tax_clearance_certificate',
                'memorandum_of_association',
                'articles_of_association',
                'board_resolution',
                'proof_of_address',
                'bank_statement',
                'kyc_status',
                'kyc_notes'
            ]);
        });
    }
};
