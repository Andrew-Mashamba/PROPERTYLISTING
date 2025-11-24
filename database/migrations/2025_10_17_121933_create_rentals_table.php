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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('landlord_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tenant_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('rent_amount', 10, 2);
            $table->decimal('deposit_amount', 10, 2);
            $table->date('lease_start_date');
            $table->date('lease_end_date');
            $table->enum('status', ['available', 'occupied', 'maintenance', 'vacant'])->default('available');
            $table->string('lease_agreement_path', 500)->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index(['landlord_id', 'status']);
            $table->index(['tenant_id', 'status']);
            $table->index(['property_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
