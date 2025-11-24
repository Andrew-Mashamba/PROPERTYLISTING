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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['property_sale', 'material_sale', 'rent_payment', 'commission', 'fee']);
            $table->decimal('amount', 15, 2);
            $table->text('description');
            $table->unsignedBigInteger('reference_id')->nullable(); // ID of related record
            $table->string('reference_type', 100)->nullable(); // Model type
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->string('payment_method', 100)->nullable();
            $table->string('transaction_id', 255)->nullable(); // External payment ID
            $table->timestamps();
            
            // Indexes
            $table->index(['user_id', 'type']);
            $table->index(['type', 'status']);
            $table->index(['reference_id', 'reference_type']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
